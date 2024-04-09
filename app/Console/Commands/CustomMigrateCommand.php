<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomMigrateCommand extends Command
{
    protected $signature = 'migrate:order';
    protected $description = 'Custom migration command to run migrations in a specific order';

    public function handle()
    {
        
        $migrations =[
            'database/migrations/0001_01_01_000000_create_users_table.php',
            'database/migrations/0001_01_01_000001_create_cache_table.php',
            'database/migrations/0001_01_01_000002_create_jobs_table.php',
            'database/migrations/2024_04_07_000004_create_offices_table.php',
            'database/migrations/2024_04_07_000001_create_roles_table.php',
            'database/migrations/2024_04_07_000002_create_clients_table.php',
            'database/migrations/2024_04_07_000003_create_managers_table.php',
            'database/migrations/2024_04_07_000005_create_secretaries_table.php',
            'database/migrations/2024_04_07_000006_create_lawyers_table.php',
            'database/migrations/2024_04_07_000007_create_legal_cases_table.php',
            'database/migrations/2024_04_07_000008_create_case_role_table.php',
            'database/migrations/2024_04_07_000009_create_sessions_table.php',
            'database/migrations/2024_04_07_000010_create_witnesses_table.php',
            'database/migrations/2024_04_07_000011_create_case_witness_table.php',
            'database/migrations/2024_04_07_000012_create_tasks_table.php',
            'database/migrations/2024_04_07_000013_create_role_task_table.php',
            'database/migrations/2024_04_09_063001_add_office_foreign_key.php',
        ];

        foreach ($migrations as $migration) {
            // Call the migrate command on a specific path
            $this->call('migrate', [
                '--path' => $migration,
                '--force' => true, // Use force in production if necessary
            ]);
        }
    }
}
