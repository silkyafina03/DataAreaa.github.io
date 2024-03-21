<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->varchar('kode_area');
            $table->varchar('nama_area');
            $table->text('deskripsi');
            $table->varchar('wilayah');
            $table->varchar('kota');
            $table->varchar('provinsi');
            $table->timestamps('created_at');
            $table->timestamps('update_at');
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
