<?php

namespace App\Http\App\Controllers\Account;

use App\Http\App\Requests\UpdateAccountRequest;

class AccountController
{
    public function index()
    {
        return view('app.account.index', [
            'user' => auth()->user(),
        ]);
    }

    public function update(UpdateAccountRequest $request)
    {
        auth()->user()->update([
            'email' => $request->email,
            'name' => $request->name,
        ]);

        flash()->success('Your account has been updated.');

        return redirect()->action([static::class, 'index']);
    }
}
