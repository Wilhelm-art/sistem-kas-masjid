<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            // Menambahkan kolom 'type' setelah kolom 'amount'
            // Defaultnya adalah 'non-tunai'
            $table->string('type')->after('amount')->default('non-tunai');

            // Menambahkan kolom 'proof' setelah kolom 'note'
            // Kolom ini boleh kosong (nullable)
            $table->string('proof')->after('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migrasi dibatalkan
            $table->dropColumn('type');
            $table->dropColumn('proof');
        });
    }
};
