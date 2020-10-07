<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    use Notifiable, HasUuid;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
    ];

    public function licenses(): HasMany
    {
        return $this->hasMany(License::class)->orderByDesc('created_at');
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class)->orderByDesc('created_at');
    }

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'video_completions');
    }

    public function canAccessVideos(): bool
    {
        return $this
            ->purchases()
            ->whereHas('product', function (Builder $query) {
                $query->whereIn('type', [Product::TYPE_VIDEOS, Product::TYPE_STANDARD]);
            })
            ->exists();
    }

    public function hasCompletedVideo(Video $video): bool
    {
        return $this->videos->contains($video);
    }
}
