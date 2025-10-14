<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Repositories\LocationRepositoryEloquent;
use App\Interfaces\Services\LocationServiceInterface;

class LocationService implements LocationServiceInterface
{
    protected Client $client;
    protected LocationRepositoryEloquent $locationRepositoryEloquent;
    protected ActivityService $activityService;

    public function __construct(
        LocationRepositoryEloquent $locationRepositoryEloquent,
        ActivityService $activityService
    ) {
        $this->client = new Client();
        $this->locationRepositoryEloquent = $locationRepositoryEloquent;
        $this->activityService = $activityService;
    }

    public function getAll(array $filters, int $perPage)
    {
        return $this->locationRepositoryEloquent->getAll($filters, $perPage);
    }

    public function import(callable $logger = null, ?int $userId = null): void
    {
        // Xoá dữ liệu cũ
        $this->locationRepositoryEloquent->truncateAll();

        // Lấy dữ liệu tỉnh/huyện/xã từ OpenAPI
        $response = $this->client->get(config('services.provinces_api.url'));
        $provinces = json_decode($response->getBody()->getContents(), true);

        foreach ($provinces as $province) {
            // Lưu tỉnh
            $provinceModel = $this->locationRepositoryEloquent->create([
                'name' => $province['name'],
                'code' => $province['code'],
                'type' => 'tinh',
                'parent_id' => null,
            ]);

            foreach ($province['districts'] as $district) {
                // Lưu huyện
                $districtModel = $this->locationRepositoryEloquent->create([
                    'name' => $district['name'],
                    'code' => $district['code'],
                    'type' => 'huyen',
                    'parent_id' => $provinceModel->id,
                ]);

                foreach ($district['wards'] as $ward) {
                    // Lưu xã
                    $wardModel = $this->locationRepositoryEloquent->create([
                        'name' => $ward['name'],
                        'code' => $ward['code'],
                        'type' => 'xa',
                        'parent_id' => $districtModel->id,
                    ]);
                }
            }
        }

        $this->activityService->log($userId, 'IMPORT_LOCATION_SUCCESS', 'Import dữ liệu địa điểm thành công.');
    }
}
