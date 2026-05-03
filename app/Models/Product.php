<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //use SoftDeletes;
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

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
    public function orderedItems():HasMany
    {
        return $this->hasMany(OrderedItems::class);
    }


}
