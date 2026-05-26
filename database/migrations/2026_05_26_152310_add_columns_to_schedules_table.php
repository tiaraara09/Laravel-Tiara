<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Tambahkan kolom jika belum ada
            if (!Schema::hasColumn('schedules', 'subject_id')) {
                $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            }
            if (!Schema::hasColumn('schedules', 'day')) {
                $table->string('day')->after('id'); // Hari: Senin, Selasa, dll
            }
            if (!Schema::hasColumn('schedules', 'start_time')) {
                $table->time('start_time')->after('day');
            }
            if (!Schema::hasColumn('schedules', 'end_time')) {
                $table->time('end_time')->after('start_time');
            }
            if (!Schema::hasColumn('schedules', 'room')) {
                $table->string('room')->nullable()->after('end_time');
            }
        });
    }

    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Hapus kolom jika rollback
            $table->dropColumn(['subject_id', 'day', 'start_time', 'end_time', 'room']);
        });
    }
};