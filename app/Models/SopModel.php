<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SopModel extends Model
{
    use HasFactory;

    protected $table = 'sop';
    protected $keyType = 'string';
    protected $fillable = ['id', 'sop', 'icon'];
    public $incrementing = false;
    public $timestamps = true;
    
    public function kegiatan()
    {
        return $this->hasMany(KegiatanModel::class, 'sop', 'id');
    }
}
