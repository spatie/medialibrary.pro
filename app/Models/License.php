<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class License extends Model implements AuthenticatableContract
{
    use HasFactory;

    use HasUuid, Authenticatable;

    public $casts = [
        'paddle_webhook_payload' => 'array',
        'mailcoach_download_count' => 'integer',
        'composer_auth_count' => 'integer',
        'expires_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'key';
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function licenses(): HasMany
    {
        return $this->hasMany(License::class);
    }

    public static function createForProduct(Product $product, User $user): self
    {
        return static::create([
            'key' => Str::random(64),
            'user_id' => $user->id,
            'product_id' => $product->id,
            'expires_at' => now()->addYear(),
        ]);
    }

    public function incrementMailCoachDownloadCount()
    {
        $this->increment('mailcoach_download_count');
    }

    public function incrementComposerAuthCount()
    {
        $this->increment('composer_auth_count');
    }

    public function scopeWhereActive(Builder $query)
    {
        $query->where('expires_at', '>', now()->toDateTimeString());
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function renew(): self
    {
        $this->update([
            'expires_at' => $this->expirationDateWhenRenewed(),
            'expiration_warning_mail_sent_at' => null,
            'expiration_mail_sent_at' => null,
        ]);

        return $this;
    }

    public function expirationDateWhenRenewed(): Carbon
    {
        $startDate = $this->expires_at->isFuture()
            ? $this->expires_at
            : now();

        return $startDate->addYear();
    }
}
