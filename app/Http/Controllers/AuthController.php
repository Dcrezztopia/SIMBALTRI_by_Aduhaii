<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'ketua_rt' => redirect()->intended('ketua_rt'),
                'ketua_rw' => redirect()->intended('ketua_rw'),
                'sekretaris' => redirect()->intended('sekretaris'),
                'bendahara' => redirect()->intended('bendahara'),
                'warga' => redirect()->intended('warga'),
                default => redirect()->intended('login'),
            };
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('username', 'password');
        if (Auth::attempt($credential)) {

            $user = Auth::user();

            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'ketua_rt' => redirect()->intended('ketua_rt'),
                'ketua_rw' => redirect()->intended('ketua_rw'),
                'sekretaris' => redirect()->intended('sekretaris'),
                'bendahara' => redirect()->intended('bendahara'),
                'warga' => redirect()->intended('warga'),
                default => redirect()->intended('login'),
            };
            return redirect()->intended('/');
        }
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukan sudah benar']);
    }

    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->intended('login');
        }

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'ketua_rt' => redirect()->intended('ketua_rt'),
            'ketua_rw' => redirect()->intended('ketua_rw'),
            'sekretaris' => redirect()->intended('sekretaris'),
            'bendahara' => redirect()->intended('bendahara'),
            'warga' => redirect()->intended('warga'),
            default => redirect()->intended('login'),
        };
    }

    public function register()
    {
        return view('register');
    }

    public function proses_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $request['role'] = 'warga';
        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();
        return Redirect('login');
    }
}
