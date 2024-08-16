<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public function pharmacies(): BelongsToMany{
        return $this->belongsToMany(Pharmacy::class, 'pharmacy_product');
    }
}
