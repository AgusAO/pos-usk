<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Acces;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($user = Auth::user()) {
            return redirect()->intended('home');
        }

        $akun = User::all()
            ->count();
        return view('login.login_view', compact('akun'));
    }

    public function proses(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'username harus diisi'
            ]
        );

        $credential = $request->only('username', 'password');

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user) {
                return redirect()->intended('home');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'Maaf username atau password salah'
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // view daftar akun
    public function viewAkun()
    {
        $id_account = auth()->id();
        $check_access = Acces::where('user', $id_account)
            ->first();
        if ($check_access->kelola_akun == 1) {
            $users = User::all();
            return view('manage_account.account', compact('users'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function firstAkun(Request $request)
    {
        // validate the request data
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'username_2' => 'required|unique:users,username',
            'password_2' => 'required|min:6'
        ]);

        // insert data into the users table
        $user = User::create([
            'name' => $validatedData['nama'],
            'username' => $validatedData['username_2'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password_2']),
            'foto' => 'default.jpg',
            'level' => 'admin',
            'remember_token' => Str::random(60)
        ]);

        // insert data into the access table and join it with the user table
        Acces::create([
            'user' => $user->id,
            'kelola_akun' => 1,
            'kelola_barang' => 1,
            'transaksi' => 1,
            'kelola_laporan' => 1
        ]);

        session()->flash('create_success', 'Akun baru berhasil dibuat');

        return redirect(url('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
