<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TekananUdara extends Model
{
    use HasFactory;

    protected $table = 'tekananudara';
    protected $primaryKey = 'id_tekananudara';
    protected $fillable = [
        'tekananudara',
        'waktu',
        'id_alat',
    ];
    public function alat()
{
    return $this->belongsTo(Alat::class, 'id_alat');
}

}
