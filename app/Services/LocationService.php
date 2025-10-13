<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Repositories\LocationRepositoryEloquent;
use App\Interfaces\Services\LocationServiceInterface;

class LocationService implements LocationServiceInterface
{
    protected Client $client;
    protected LocationRepositoryEloquent $locationRepositoryEloquent;

    public function __construct(LocationRepositoryEloquent $locationRepositoryEloquent)
    {
        $this->client = new Client();
        $this->locationRepositoryEloquent = $locationRepositoryEloquent;
    }

    public function import(callable $logger = null): void
    {
        $this->log($logger, "🔄 Bắt đầu import các khu vực hành chính của Việt Nam từ provinces.open-api.vn...");

        // Xoá dữ liệu cũ
        $this->locationRepositoryEloquent->truncateAll();
        $this->log($logger, "🗑️ Dữ liệu cũ đã được xoá.");

        // Lấy dữ liệu tỉnh/huyện/xã từ OpenAPI
        $response = $this->client->get(config('services.provinces_api.url'));
        $provinces = json_decode($response->getBody()->getContents(), true);

        foreach ($provinces as $province) {
            // Lưu tỉnh
            $provinceModel = $this->locationRepositoryEloquent->create([
                'name' => $province['name'],
                'code' => $province['code'],
                'type' => 'tỉnh',
                'parent_id' => null,
            ]);
            $this->log($logger, "✅ Đã lưu tỉnh: " . $provinceModel->name);

            foreach ($province['districts'] as $district) {
                // Lưu huyện
                $districtModel = $this->locationRepositoryEloquent->create([
                    'name' => $district['name'],
                    'code' => $district['code'],
                    'type' => 'huyện',
                    'parent_id' => $provinceModel->id,
                ]);
                $this->log($logger, "  └─✅ Huyện: " . $districtModel->name);

                foreach ($district['wards'] as $ward) {
                    // Lưu xã
                    $wardModel = $this->locationRepositoryEloquent->create([
                        'name' => $ward['name'],
                        'code' => $ward['code'],
                        'type' => 'xã',
                        'parent_id' => $districtModel->id,
                    ]);
                    $this->log($logger, "      └─✅ Xã: " . $wardModel->name);
                }
            }
        }

        $this->log($logger, "🎉 Import hoàn tất.");
    }

    protected function log(?callable $logger, string $message): void
    {
        if ($logger) {
            $logger($message);
        }
    }
}