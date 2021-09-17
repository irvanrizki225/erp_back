<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\job;
use App\Models\karyawan;
use App\Models\suplayer;
use App\Models\po;
use App\Models\item_list;

class pr extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'karyawan_id',
        'suplayer_id',
        'uuid',
        'type',
        'quantity',
        'date',
        'price',
        'status',
    ];
    
    public function po()
    {
        return $this->hasMany(po::class);
    }
    public function item_list()
    {
        return $this->hasMany(item_list::class);
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
    
}
