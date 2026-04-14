<?php

use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('schedules', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('speaker_name');
                $table->date('date');
                $table->time('time');
                $table->enum('type', ['khatib_jumat', 'pengajian_rutin']);
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('schedules');
        }
    };
