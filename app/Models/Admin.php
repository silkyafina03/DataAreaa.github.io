<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "Admin";
    protected $fillable = ['kode_area','nama_area','deskripsi','wilayah','kota','provinsi'];
}
