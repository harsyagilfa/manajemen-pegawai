<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $fillable = [
        'user_id',
        'tanggal_lahir',
        'no_hp',
        'jenis_kelamin',
        'alamat',
        'jabatan',
        'gaji_pokok',
        'tanggal_masuk',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
