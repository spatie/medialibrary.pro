<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const TYPE_STANDARD = 'standard';
    public const TYPE_STANDARD_RENEWAL = 'standard-renewal';
    public const TYPE_VIDEOS = 'videos';
}
