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
        Schema::create('admin', function (Blueprint $table) {
            $table->string('kode_area')->primary(); // Mendefinisikan kolom 'kode_area' sebagai primary key
            $table->string('nama_area');
            $table->text('deskripsi');
            $table->string('kota');
            $table->string('provinsi');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
