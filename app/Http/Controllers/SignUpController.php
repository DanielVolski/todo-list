<?php

namespace App\Http\Controllers;

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

        dd($validated);
    }
}
