<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Makeup extends Model
{
    use HasFactory;

    protected $fillable = ["img", "alternateImg", "type", "correct", "category_id"];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
