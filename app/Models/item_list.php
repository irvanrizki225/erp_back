<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\pr;
use App\Models\po;
use App\Models\item;

class item_list extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'pr_id', 'po_id', 'item_id', 'name', 'type', 'price'
    ];

    public function pr()
    {
        return $this->belongsTo(pr::class);
    }
    public function po()
    {
        return $this->belongsTo(po::class);
    }
    public function item()
    {
        return $this->belongsTo(item::class);
    }
}
