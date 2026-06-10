<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'brand',
        'ref_article',
        'gtin',
        'product_description',
        'product_notes',
        'quantity',
        'product_image'
    ];

    public function orderItems():HasMany
    {
        return $this->hasMany(OrderItem::class);
    }


}
