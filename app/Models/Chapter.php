<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
