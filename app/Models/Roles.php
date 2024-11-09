<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['nama_role','deskripsi'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
