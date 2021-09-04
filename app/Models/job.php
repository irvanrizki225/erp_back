<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\job_karyawan;
use App\Models\pr;
use App\Models\po;
use App\Models\penerimaan_barang;
use App\Models\barang;
use App\Models\invoice;

class job extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'name', 'company', 'profit', 'price'
    ];

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
    public function po()
    {
        return $this->hasMany(po::class);
    }
    public function pr()
    {
        return $this->hasMany(pr::class);
    }
    public function job_karyawan()
    {
        return $this->hasMany(job_karyawan::class);
    }

}
