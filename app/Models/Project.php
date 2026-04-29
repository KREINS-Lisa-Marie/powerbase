<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{

    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'project_name',
        'person_in_charge',
        'phone_in_charge',
        'project_type',
        'client_name',
        'project_address',
        'project_description',
    ];

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }


}
