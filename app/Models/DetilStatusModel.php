<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilStatusModel extends Model
{
    use HasFactory;

    protected $table = 'detil_status';
    protected $keyType = 'string';
    protected $fillable = ['id', 'id_status', 'id_kegiatan_sop'];
    public $incrementing = false;
    public $timestamps = true;
    
    public function status()
    {
        return $this->belongsTo(StatusModel::class, 'id_status', 'id');
    }

    public function kegiatan_sop()
    {
        return $this->belongsTo(KegiatanSopModel::class, 'id_kegiatan_sop', 'id');
    }
}
