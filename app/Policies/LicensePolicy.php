<?php

namespace App\Policies;

use App\Models\License;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LicensePolicy
{
    use HandlesAuthorization;

    public function administer(User $user, License $license): bool
    {
        return (int) $license->user_id === (int) $user->id;
    }
}
