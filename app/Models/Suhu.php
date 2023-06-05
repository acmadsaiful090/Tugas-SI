<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suhu extends Model
{
    protected $table = 'suhu';
    protected $primaryKey = 'id_suhu';
    protected $fillable = [
        'suhu',
        'waktu',
        'id_alat',
    ];
    public function alat()
    {
        return $this->belongsTo(Alat::class, 'id_alat');
    }
    
}
