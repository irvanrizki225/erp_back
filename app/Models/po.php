<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\job;
use App\Models\karyawan;
use App\Models\suplayer;
use App\Models\pr;
use App\Models\penerimaan_barang;
use App\Models\barang;
use App\Models\invoice;

class po extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'karyawan_id',
        'suplayer_id',
        'pr_id',
        'uuid',
        'type',
        'date', 
        'quantity', 
        'price', 
        'invoice', 
        'status', 
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


    public function job()
    {
        return $this->belongsTo(job::class);
    }
    public function karyawan()
    {
        return $this->belongsTo(karyawan::class);
    }
    public function suplayer()
    {
        return $this->belongsTo(suplayer::class);
    }
    public function pr()
    {
        return $this->belongsTo(pr::class);
    }
    

}
