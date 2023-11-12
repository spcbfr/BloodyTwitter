<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tweet extends Model
{
    use HasFactory;

    public $fillable = ['message'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
