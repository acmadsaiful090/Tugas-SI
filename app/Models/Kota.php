<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'kotas';
    protected $primaryKey = 'id_kota';

    protected $fillable = [
        'kota',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
    }

    public function lokasis()
    {
        return $this->hasMany(Lokasi::class, 'id_kota');
    }
}
