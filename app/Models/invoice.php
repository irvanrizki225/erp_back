<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\po;
use App\Models\payment;
use App\Models\karyawan;
use App\Models\job;

class invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'po_id', 'payment_id','karyawan_id','job_id', 'uuid'
    ];

    public function payment()
    {
        return $this->belongsTo(payment::class);
    }
    public function po()
    {
        return $this->belongsTo(po::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(karyawan::class);
    }

    public function job()
    {
        return $this->belongsTo(job::class);
    }
}
