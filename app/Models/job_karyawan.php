<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\karyawan;
use App\Models\job;

class job_karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'karyawan_id',
        'name',
        'req_date',
        'start',
        'finished',
        'description',
    ];

    public function job()
    {
        return $this->belongsTo(job::class);
    }
    public function karyawan()
    {
        return $this->belongsTo(karyawan::class);
    }
}
