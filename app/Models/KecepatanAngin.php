<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecepatanAngin extends Model
{
    use HasFactory;

    protected $table = 'kecepatanangin';
    protected $primaryKey = 'id_kecepatanangin';
    protected $fillable = [
        'kecepatanangin',
        'waktu',
        'id_alat',
    ];
    public function alat()
{
    return $this->belongsTo(Alat::class, 'id_alat');
}

}
