<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];
    protected $fillable=['username', 'password'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;
}
