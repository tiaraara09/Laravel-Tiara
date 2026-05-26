<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil semua subject yang sudah ada
        $subjects = Subject::all();

        // Contoh data jadwal
        $schedules = [
            ['day' => 'Senin', 'start_time' => '08:00', 'end_time' => '10:00', 'room' => 'Lab A'],
            ['day' => 'Senin', 'start_time' => '10:00', 'end_time' => '12:00', 'room' => 'R. 201'],
            ['day' => 'Selasa', 'start_time' => '13:00', 'end_time' => '15:00', 'room' => 'Lab B'],
            ['day' => 'Rabu', 'start_time' => '09:00', 'end_time' => '11:00', 'room' => 'R. 102'],
            ['day' => 'Kamis', 'start_time' => '14:00', 'end_time' => '16:00', 'room' => 'Lab A'],
        ];

        foreach ($subjects as $index => $subject) {
            // Assign 1-2 jadwal per subject
            $numSchedules = rand(1, 2);
            for ($i = 0; $i < $numSchedules; $i++) {
                $scheduleData = $schedules[array_rand($schedules)];
                $scheduleData['subject_id'] = $subject->id;
                Schedule::create($scheduleData);
            }
        }
    }
}