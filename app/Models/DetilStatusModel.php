<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilStatusModel extends Model
{
    use HasFactory;

    protected $table = 'detil_status';
    protected $keyType = 'string';
    protected $fillable = ['id', 'status', 'kegiatan'];
    public $incrementing = false;
    public $timestamps = true;
    
    public function status()
    {
        return $this->belongsTo(StatusModel::class, 'status', 'id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(KegiatanModel::class, 'kegiatan', 'id');
    }
}
