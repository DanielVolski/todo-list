<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function signup(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required'],
            'cpf' => ['required'],
            'birthDate' => ['required'],
            'password' => ['required']
        ]);

        // $user = new User();

        // $user->name = $validated['name'];
        // $user->email = $validated['email'];
        // $user->cpf = $validated['cpf'];
        // $user->birth_date = $validated['birthDate'];
        // $user->password = $validated['password'];

        // $user->save();

        User::create($validated);

        return redirect()->route('signin');
    }
}
