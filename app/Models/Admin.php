<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admin";
    public $incrementing = false;
    protected $primaryKey = 'kode_area';
    protected $fillable = ['kode_area','nama_area','deskripsi','wilayah_id','kota','provinsi'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id', 'wilayah_id');
    }
}
