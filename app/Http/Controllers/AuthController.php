<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        // if(Auth::check()) {
        //     if(session('level') === "admin") {
        //         return redirect('/admin');
        //     } else if(session('level') === "customer") {
        //         return redirect('/');
        //     }
        // }

        if(Auth::check()) {
            if(session('level') === "customer") {
                return redirect('/');
            }
        }

        return view('login.login');

    }

    public function aksiLogin(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required|min:6",
        ]);

        // bentuk pengecualian input, jadi hanya email dan password yang boleh masuk
        $credentials = $request->only('email', 'password');

        // melakukan aksi login
        $login = Auth::attempt($credentials);

        if ($login) {
            // ambil data pertama
            $selectUser = User::firstWhere('email',$request->email);

            $data = [
                "id" => $selectUser->id,
                "name" => $selectUser->name,
                "level" => $selectUser->level
            ];

            // massukkan data ke session : id, name
            session($data);

            if (session('level') == "customer") {
                return redirect('/');
            } else {
                return redirect('login')->withErrors('Email atau Password tidak Cocok');
            }   
        } else {
            return redirect()->back()->withErrors('Email atau Password salah!');
        }
    }

    public function adminIndex()
    {
        // if(Auth::check()) {
        //     if(session('level') === "admin") {
        //         return redirect('/admin');
        //     } else if(session('level') === "customer") {
        //         return redirect('/');
        //     }
        // }

        if(Auth::check()) {
            if(session('level') === "admin") {
                return redirect('/admin');
            }
        }

        return view('login.loginadmin');
    }

    public function adminAksiLogin(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required|min:6",
        ]);

        // bentuk pengecualian input, jadi hanya email dan password yang boleh masuk
        $credentials = $request->only('email', 'password');

        // melakukan aksi login
        $login = Auth::attempt($credentials);

        if ($login) {
            // ambil data pertama
            $selectUser = User::firstWhere('email',$request->email);

            $data = [
                "id" => $selectUser->id,
                "name" => $selectUser->name,
                "level" => $selectUser->level
            ];

            // massukkan data ke session : id, name
            session($data);

            if (session('level') == "admin") {
                return redirect('/adminLogin');
            } else {
                return redirect('adminLogin')->withErrors('Email atau Password tidak Cocok');
            }   
        } else {
            return redirect()->back()->withErrors('Email atau Password salah!');
        }
    }



    
             


            // if (session('level') == "admin") {
            //     return redirect('/admin');
            // } else if (session('level') == "customer") {
            //     return redirect('/');
            // }
        

    public function register()
    {
        if(Auth::check()) {
            if(session('level') === "admin") {
                return redirect('/admin');
            } else if(session('level') === "customer") {
                return redirect('/');
            }
        }
        return view('login.register');
    }

    public function aksiRegister(Request $request)
    {
       $request->validate([
            'name' =>'required',

            // email = input memenuhi syarat dari format email
            // unique = input ini tidak boleh sama dengan data
            //          pada database di tabel user.    
            'email' =>'required|email|unique:users',
            'password' =>'required|min:6',
            'level' =>'required',
        ]);

        //Pilihan 1
        // $data = $request->all();

        //Pilihan 2
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level
        ];

        // eksekusi query tambah data user
        $create = User::create($data);

        // jika aksi tambah user berhasil
        if($create) {

            // Session::flash('message', 'IT Works');
            // pindah ke halaman login dan kasih pesan berhasil
            return redirect('/login')->withSuccess('Akun anda telah terdaftar');
        } else {
            // jika aksi tambah user gagal
            // kembali ke halaman sebelumnya, kirim error ke setiap input
            return redirect()
            ->back()
            ->withInput();
        }
    }

    public function home()
    {
            //jika memang sudah login  tampilkan halaman home
            $data = [
                "id" => session('id'),
                "name" => session('name')
            ];
            return view('admin.index.index', compact('data'));
        // }
        // kalo misalkan user belum login, pindah ke halaman login
        // muncul pesan error
        // return redirect('/')->withErrors('Anda harus login terlebih dahulu');
    }

    public function destroy()
    {
        if(Auth::check()) {
            if(session('level') == "admin") {
                // hapus semua data pada session
                Session::flush();
                // lakukan logout
                Auth::logout();
                // pindah ke halaman form login
                return redirect('/adminLogin');
            } else if (session('level') == "customer") {
                // hapus semua data pada session
                Session::flush();
                // lakukan logout
                Auth::logout();
                // pindah ke halaman form login
                return redirect('/login');
            }
        }

    }
}
