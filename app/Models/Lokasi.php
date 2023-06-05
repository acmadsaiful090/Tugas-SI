<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';

    protected $primaryKey = 'id_lokasi'; // Primary key column name

    protected $fillable = ['id_kota', 'lokasi']; // Fillable columns


    // Relationship One-to-Many dengan model Kota
    public function kotas()
{
    return $this->belongsTo(Kota::class, 'id_kota');
}

public function provinsi()
{
    return $this->belongsTo(Provinsi::class, 'id_provinsi');
}
public function alat()
    {
        return $this->hasMany(alat::class, 'id_alat');
    }

}
