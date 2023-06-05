<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $primaryKey = 'id_session';

    protected $fillable = [
        'id_session', 'id_user', 'start_time', 'end_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}    
