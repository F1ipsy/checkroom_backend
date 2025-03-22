<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function clothes(): HasMany
    {
        return $this->hasMany(Clothes::class);
    }

    public function makeup()
    {
        return $this->hasMany(Makeup::class);
    }

    public function jewelry()
    {
        return $this->hasMany(Jewelry::class);
    }

    public function recommendations(): HasMany
    {
        return $this->hasMany(Recommendation::class);
    }
}
