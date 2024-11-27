<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    protected $fillable = [
        'pegawai_id',
        'tanggal_absensi',
        'foto_in',
        'foto_out',
        'check_in',
        'check_out',
        'location_in',
        'location_out',
        'status',
    ];
    public function pegawai()
    {
        return $this->belongsTo(User::class, 'pegawai_id', 'id');
    }
}
