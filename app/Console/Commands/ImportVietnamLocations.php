<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\LocationService;
use Exception;

class ImportVietnamLocations extends Command
{
    // run command: 'php artisan import:vietnam-locations'
    protected $signature = 'import:vietnam-locations';
    protected $description = 'Import administrative locations of South Vietnam from OpenStreetMap';

    protected LocationService $importService;

    public function __construct(LocationService $importService)
    {
        parent::__construct();
        $this->importService = $importService;
    }

    public function handle()
    {
        try {
            $this->info('Starting import command...');
            $this->importService->import(fn($msg) => $this->info($msg));
            $this->info('Import command finished.');
            return 0;
        } catch (Exception $e) {
            $this->error('Error during import: ' . $e->getMessage());
            $this->error($e->getTraceAsString());
            return 1;
        }
    }
}