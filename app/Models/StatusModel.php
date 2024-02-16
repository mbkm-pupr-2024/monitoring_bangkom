<?php

namespace App\Models;

use App\Models\PelatihanModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusModel extends Model
{
    use HasFactory;

    protected $table = 'status';
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'status', 'pelatihan'];
    public $incrementing = false;
    public $timestamps = true;
    
    public function pelatihan()
    {
        return $this->belongsTo(PelatihanModel::class, 'pelatihan', 'id');
    }

    public function detil_status()
    {
        return $this->hasMany(DetilStatusModel::class, 'status', 'id');
    }
}
