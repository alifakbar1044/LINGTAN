<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Tangani data yang telah divalidasi, misalnya menyimpannya ke database
        // ...

        return redirect('/form')->with('success', 'Form berhasil dikirim!');
    }
}
