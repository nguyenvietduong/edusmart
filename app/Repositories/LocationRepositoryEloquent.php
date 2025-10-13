<?php

namespace App\Repositories;

use App\Models\Location;
use App\Interfaces\Repositories\LocationRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Eloquent\BaseRepository;

class LocationRepositoryEloquent extends BaseRepository implements LocationRepositoryInterface
{
    public function model()
    {
        return Location::class;
    }

    public function truncateAll()
    {
        $this->model->query()->delete();
    }

    public function create(array $data)
    {
        try {

            return $this->model()::create($data);
        } catch (\Exception $e) {
            Log::error('Error creating Location: ' . $e->getMessage() . ' Data: ' . json_encode($data));
            throw $e;
        }
    }

    public function findByOsmId($osmId)
    {
        try {

            return $this->model()::where('osm_id', $osmId)->first();
        } catch (\Exception $e) {
            Log::error('Error findByOsmId Location: ' . $e->getMessage() . ' OsmId: ' . json_encode($osmId));
            throw $e;
        }
    }
}