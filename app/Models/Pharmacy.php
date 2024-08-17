<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Pharmacy extends Model
{
    use Searchable;
    use HasFactory;

    protected $table = 'pharmacy';
    protected $guarded = [];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function products(): BelongsToMany{
        return $this->belongsToMany(Product::class, 'pharmacy_product')
            ->withPivot('price', 'quantity');
    }
}
