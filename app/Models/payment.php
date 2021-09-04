<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'prince, ',
        'foto',
    ];

    public function invoice()
    {
        return $this->hasMany(invoice::class);
    }
}
