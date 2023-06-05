<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsis'; // nama tabel pada database
    protected $primaryKey = 'id_provinsi';

    protected $fillable = [
        'provinsi',
    ];

    public function kotas()
    {
        return $this->hasMany(Kota::class, 'id_provinsi');
    }
    public function lokasis()
{
    return $this->hasManyThrough(Lokasi::class, Kota::class, 'id_provinsi', 'id_kota');
}

}
