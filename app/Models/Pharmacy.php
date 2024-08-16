<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pharmacy extends Model
{
    use HasFactory;

    protected $table = 'pharmacy';
    protected $guarded = [];
    
    public function products(): BelongsToMany{
        return $this->belongsToMany(Product::class, 'pharmacy_product');
    }
}
