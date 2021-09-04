<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\po;
use App\Models\karyawan;
use App\Models\suplayer;
use App\Models\job;
use App\Models\penerimaan_barang;

class barang extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'job_id',
        'karyawan_id',
        'suplayer_id',
        'po_id',
        'penerimaan_barang_id',
        'description',
    ];

    public function po()
    {
        return $this->belongsTo(po::class);
    }
    public function karyawan()
    {
        return $this->belongsTo(karyawan::class);
    }
    public function suplayer()
    {
        return $this->belongsTo(suplayer::class);
    }
    public function job()
    {
        return $this->belongsTo(job::class);
    }
    public function penerimaan_barang()
    {
        return $this->belongsTo(penerimaan_barang::class);
    }
}
