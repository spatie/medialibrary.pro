<?php

namespace App\Http\App\Controllers\Account;

use App\Http\App\Requests\UpdatePasswordRequest;

class PasswordController
{
    public function index()
    {
        return view('app.account.password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        auth()->user()->update(['password' => bcrypt($request->password)]);

        flash()->success('Your password has been updated.');

        return redirect()->action([static::class, 'index']);
    }
}
