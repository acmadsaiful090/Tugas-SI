<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelembaban extends Model
{
    use HasFactory;

    protected $table = 'kelembaban';
    protected $primaryKey = 'id_kelembaban';
    protected $fillable = [
        'kelembaban',
        'waktu',
        'id_alat',
    ];
    public function alat()
{
    return $this->belongsTo(Alat::class, 'id_alat');
}

}
