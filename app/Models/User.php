<?php

namespace App\Models;
use App\Models\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = ['username', 'password', 'email', 'role'];
    public $timestamps = false; 
    public function getRole()
    {
        return $this->role;
    }
    public function sessions()
    {
        return $this->hasMany(Session::class, 'id_user');
    }
}
