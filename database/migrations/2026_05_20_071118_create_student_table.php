<?php

// database/migrations/xxxx_xx_xx_create_students_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('name');
            $table->text('address');
            $table->foreignId('major_id')->constrained('majors')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('students');
    }
};