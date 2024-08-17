<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Uuid\Type\Integer;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $guarded = [];
    
    public function pharmacies(): BelongsToMany{
        return $this->belongsToMany(Pharmacy::class, 'pharmacy_product')
            ->withPivot('price', 'quantity');
    }

    public function getTotalQuantityAttribute() {
        return $this->pharmacies()->sum('quantity');
    }

    public function getBestPriceAttribute() {
        return $this->pharmacies()->min('price');
    }
}
