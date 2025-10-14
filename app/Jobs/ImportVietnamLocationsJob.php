<?php

namespace App\Jobs;

use App\Services\LocationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ImportVietnamLocationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // ID of the user who triggered the import
    protected int $userId;

    /**
     * Create a new job instance.
     *
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     * This method calls the LocationService to import data.
     *
     * @param LocationService $locationService
     * @return void
     */
    public function handle(LocationService $locationService)
    {
        try {
            // Log the start of the import process
            Log::info("User ID {$this->userId} started importing locations.");

            // Call the import service directly, providing a callback to log messages
            $locationService->import(function ($message) {
                Log::info($message);
            }, $this->userId);

            // Log completion of the import process
            Log::info("User ID {$this->userId} completed importing locations.");
        } catch (\Throwable $e) {
            // Log any errors that occur during import
            Log::error("Error importing locations: " . $e->getMessage());
        }
    }
}