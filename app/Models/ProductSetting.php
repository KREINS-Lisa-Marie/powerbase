<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'comment',
        'company_id',
        'product_id',
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
