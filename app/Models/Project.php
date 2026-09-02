<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{

    use HasFactory;

    protected $fillable = [
        'company_id',
        'project_name',
        'user_id',
        'project_type',
        'project_state',
        'client_name',
        'project_address',
        'project_description',
    ];

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
