<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\karyawan;

class departemen extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
    ];

    public function karyawan()
    {
        return $this->hasMany(karyawan::class);
    }
}
