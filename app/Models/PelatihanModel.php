<?php

namespace App\Models;

use App\Models\StatusModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelatihanModel extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';
    protected $fillable = [
        'id', 'pelatihan', 'bidang_pelatihan', 'icon','tanggal_mulai', 'tanggal_selesai'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    public function bidangPelatihan()
    {
        return $this->belongsTo(BidangPelatihanModel::class, 'bidang_pelatihan', 'id');
    }
    
    public function status()
    {
        return $this->hasMany(StatusModel::class, 'pelatihan', 'id');
    }

    
}
