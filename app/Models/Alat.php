<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';
    protected $primaryKey = 'id_alat';
    protected $fillable = [
        'alat',
        'waktu',
        'id_lokasi'
    ];



    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }
    public function suhu()
{
    return $this->hasMany(Suhu::class, 'id_alat');
}

public function kelembaban()
{
    return $this->hasMany(Kelembaban::class, 'id_alat');
}

public function tekananUdara()
{
    return $this->hasMany(TekananUdara::class, 'id_alat');
}

public function kecepatanAngin()
{
    return $this->hasMany(KecepatanAngin::class, 'id_alat');
}

}


