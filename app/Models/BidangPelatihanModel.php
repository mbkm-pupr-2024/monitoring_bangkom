<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangPelatihanModel extends Model
{
    use HasFactory;

    protected $table = 'bidang_pelatihan';

    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'bidang_pelatihan',
        'gambar',
    ];
    
    public function pelatihan()
    {
        return $this->hasMany(PelatihanModel::class, 'bidang_pelatihan', 'id');
    }
}
