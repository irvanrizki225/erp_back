<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_daily extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'name', 'quantity', 'unit', 'price', 'date_id', 'date_out'
    ];
}
