<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'warehouse_phone',
        'warehouse_email',
    ];

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function projects():HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function productSettings():HasMany
    {
        return $this->hasMany(ProductSetting::class);
    }

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }

}
