<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $keyType = 'string';
    protected $fillable = ['id', 'kegiatan','deskripsi', 'sop', ];
    public $incrementing = false;
    public $timestamps = true;

    public function sop_pelatihan()
    {
        return $this->belongsTo(SopModel::class, 'sop', 'id');
    }

    public function detilStatus()
    {
        return $this->hasMany(DetilStatusModel::class, 'kegiatan', 'id');
    }
}
