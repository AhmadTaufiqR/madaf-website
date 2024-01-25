<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function index_login() {
        return view('login.login');
    }

    function check_login(Request $request) {
        
        try {
            $request->validate([
                'email-name' => 'required',
                'password' => 'required',
            ], [
                'email-name.required' => 'Kolom email atau username harus diisi.',
                'password.required' => 'Kolom password harus diisi.',
            ]);
        
            // Memeriksa apakah input memiliki format email yang valid
            $loginField = filter_var($request->input('email-name'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        
            $login = [
                $loginField => $request->input('email-name'),
                'password' => $request->password,
            ];
        
            // Get the user's level, assuming the User model has a "level" attribute
            $user = User::where($loginField, '=', $request->input('email-name'))->first();
        
            if ($user) {
                if ($user->level === 'santri') {
                    if (Auth::attempt($login)) {
                        return redirect('dashboard')->with('success', 'Anda Berhasil Login Santri');
                    } else {
                        throw ValidationException::withMessages([$loginField => 'Username atau Password yang anda masukkan salah']);
                    }
                } elseif ($user->level === 'admin') {
                    if (Auth::attempt($login)) {
                        return redirect('dashboard')->with('success', 'Anda Berhasil Login Admin');
                    } else {
                        throw ValidationException::withMessages([$loginField => 'Username atau Password yang anda masukkan salah']);
                    }
                }
            }
        
            throw ValidationException::withMessages([$loginField => 'Akun tidak ditemukan atau tidak memiliki hak akses.']);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            // Tangani kesalahan lainnya, jika diperlukan
            return redirect('/')->withErrors('Terjadi kesalahan saat login');
        }   
    }

        
    function logout() {
        Auth::logout();
        return redirect('/');
    }
    
}
