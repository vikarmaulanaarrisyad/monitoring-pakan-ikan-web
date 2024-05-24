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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aplikasi')->nullable();
            $table->string('nama_singkatan_aplikasi')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('logo_login')->nullable()->default('login.png');
            $table->string('logo_aplikasi')->nullable()->default('logo_aplikasi.png');
            $table->string('favicon')->nullable()->default('favicon.png');

            $table->string('instagram_link')->default('-')->nullable();
            $table->string('twitter_link')->default('-')->nullable();
            $table->string('fanpage_link')->default('-')->nullable();
            $table->string('google_plus_link')->default('-')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
