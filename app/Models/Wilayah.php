<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table ="wilayah";
    public $incrementing = false;
    protected $primaryKey="wilayah_id";
    protected $fillable=['wilayah_id','nama_wilayah'];
    use HasFactory;

    public function admin()
    {
        return $this->hasMany(Admin::class, 'wilayah_id', 'wilayah_id');
    }
}

