<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class BackupSeeders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:seeders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup all database seeder files to a backup directory';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sourceDir = base_path('database/seeders');
        $backupDir = base_path('database/seeders_backup');

        if (!File::exists($sourceDir)) {
            $this->error('Seeder directory does not exist.');
            return 1;
        }

        // Create backup directory if it doesn't exist
        if (!File::exists($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        // Copy files to the backup directory
        File::copyDirectory($sourceDir, $backupDir);

        $this->info('Seeders have been backed up to: ' . $backupDir);
        return 0;
    }
}
