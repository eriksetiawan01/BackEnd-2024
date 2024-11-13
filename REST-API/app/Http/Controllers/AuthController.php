<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {
        // Menangkap inputan
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        // Memasukan data ke tabel user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully'
        ];

        // Mengirim respon JSON
        return response()->json($data, 200);
    }

    public function login(Request $request) {
        // Menangkap input user
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // Mengambil data user
        $user = User::where('email', $input['email'])->first();

        // Membandingkan input user dengan data user
        $isLoginSuccessfully = (
            $input['email'] == $user->email
            &&
            Hash::check($input['password'], $user->password)
        );

        if ($isLoginSuccessfully) {
            // Membuat token
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login Successfully',
                'token' => $token->plainTextToken
            ];

            // Mengembalikan response JSON
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Username or Password is wrong'
            ];

            return response()->json($data, 401);
        }
    }

    // Membuat fitur login
    // public function login(Request $request) {
    //     // Menamngkap input user
    //     $input = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];

    //     // Melakukan authentikasi
    //     if (Auth::attempt($input)) {
    //         // Membuat token
    //         $token = Auth::user()->createToken('auth_token');

    //         $data = [
    //             'message' => 'Login Successfully',
    //             'token' => $token->plainTextToken
    //         ];

    //         // Mengembalikan response JSON
    //         return response()->json($data, 200);
    //     } else {
    //         $data = [
    //             'message' => 'Username or Password is wrong'
    //         ];

    //         return response()->json($data, 401);
    //     }
    // }
}
