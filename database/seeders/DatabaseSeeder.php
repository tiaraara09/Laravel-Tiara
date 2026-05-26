<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    $this->call([
        MajorSeeder::class,
        SubjectSeeder::class,
        ScheduleSeeder::class,   // tambahkan ini
        StudentSeeder::class,
    ]);
}
}