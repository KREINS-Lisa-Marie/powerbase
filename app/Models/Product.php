<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'product_name',
        'brand',
        'ref_article',
        'gtin',
        'product_description',
        'product_notes',
        'product_image'
    ];

    public function orderItems():HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function productSettings():HasMany
    {
        return $this->hasMany(ProductSetting::class);
    }


}
