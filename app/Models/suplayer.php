<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\pr;
use App\Models\po;
use App\Models\penerimaan_barang;
use App\Models\barang;

class suplayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama', 'Alamat', 'Telp'
    ];

    public function pr()
    {
        return $this->hasMany(pr::class);
    }

    public function po()
    {
        return $this->hasMany(po::class);
    }

    public function penerimaan_barangs()
    {
        return $this->hasMany(penerimaan_barang::class);
    }

    public function barangs()
    {
        return $this->hasMany(barang::class);
    }

}
