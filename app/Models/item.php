<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\item_list;

class item extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid', 'name', 'type', 'quantity', 'unit', 'price'
    ];

    public function item_list()
    {
        return $this->hasMany(item_list::class);
    }
}
