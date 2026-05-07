<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'for_who',
        'phone',
        'project_name',
        'order_state',
        'ordered_at'
    ];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function projects():BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
