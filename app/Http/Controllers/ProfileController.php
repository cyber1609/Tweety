<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{


    public function show(User $user)
    {
        $tweets = $user->tweets()->paginate(50);
        return view('profiles.show', compact(['user', 'tweets']));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = \request()->validate(
            [
                'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user), 'alpha_dash'],
                'name' => ['required', 'string', 'max:255'],
                'avatar' => ['image'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

        if (\request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect(route('profile.show', $user));

    }
}
