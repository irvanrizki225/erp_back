<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\departemen;
use App\Models\pr;
use App\Models\po;
use App\Models\penerimaan_barang;
use App\Models\barang;
use App\Models\invoice;
use App\Models\job_karyawan;

class karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'departemen_id',
        'name',
        'no_telp',
        'alamat',
    ];

    public function pr()
    {
        return $this->hasMany(pr::class);
    }
    public function job_karyawan()
    {
        return $this->hasMany(job_karyawan::class);
    }

    public function po()
    {
        return $this->hasMany(po::class);
    }

    public function penerimaan_barang()
    {
        return $this->hasMany(penerimaan_barang::class);
    }

    public function barang()
    {
        return $this->hasMany(barang::class);
    }

    public function invoice()
    {
        return $this->hasMany(invoice::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(departemen::class);
    }
}
