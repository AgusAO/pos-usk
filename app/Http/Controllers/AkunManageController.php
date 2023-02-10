<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acces;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AkunManageController extends Controller
{
    // view daftar akun
    public function index()
    {
        $id_account = auth()->id();
        $check_access = Acces::where('user', $id_account)
            ->first();
        // if ($check_access != null) {
            if ($check_access->kelola_akun == 1) {
                $user = User::all();
                $masuk = Auth::user();
                return view('manage_account.account', with([
                    'user' => $user,
                    'masuk' => $masuk
                    ]));
            } else {
                return redirect()->back();
            }
        // } else {
        //     return redirect()->back();
        // }
    }


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

    public function viewNewAccount()
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
            ->first();
        if ($check_access->kelola_akun == 1) {
            $masuk =  Auth::user();
            // dd($user);
            return view('manage_account.new_account', compact('masuk'));
        } else {
            return back();
        }
    }

    // Create New Account
    public function createAccount(Request $req)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if ($check_access->kelola_akun == 1) {

            $check_email = User::all()
            ->where('email', $req->email)
            ->count();
            $check_username = User::all()
            ->where('username',
                $req->username
            )
            ->count();

            if ($req->foto != '' && $check_email == 0 && $check_username == 0)
             {
                $users = new User;
                $users->name = $req->nama;
                $users->level = $req->role;
                $foto = $req->file('foto');
                $users->foto = $foto->getClientOriginalName();
                $foto->move(public_path('pictures/'), $foto->getClientOriginalName());
                $users->email = $req->email;
                $users->username = $req->username;
                $users->password = bcrypt($req->password);
                $users->remember_token = Str::random(60);
                $users->save();
                if ($req->level == 'admin') {
                    $access = new Acces;
                    $access->user = $users->id;
                    $access->kelola_akun = 1;
                    $access->kelola_barang = 1;
                    $access->transaksi = 1;
                    $access->kelola_laporan = 1;
                    $access->save();
                } else {
                    $access = new Acces;
                    $access->user = $users->id;
                    $access->kelola_akun = 0;
                    $access->kelola_barang = 1;
                    $access->transaksi = 1;
                    $access->kelola_laporan = 1;
                    $access->save();
                }

                Session::flash('create_success', 'Akun baru berhasil dibuat');

                return redirect('/account');
            } else if ($req->foto == '' && $check_email == 0 && $check_username == 0) {
                $users = new User;
                $users->name = $req->nama;
                $users->level = $req->role;
                $users->foto = 'default.jpg';
                $users->email = $req->email;
                $users->username = $req->username;
                $users->password = bcrypt($req->password);
                $users->remember_token = Str::random(60);
                $users->save();
                if ($req->level == 'admin') {
                    $access = new Acces;
                    $access->user = $users->id;
                    $access->kelola_akun = 1;
                    $access->kelola_barang = 1;
                    $access->transaksi = 1;
                    $access->kelola_laporan = 1;
                    $access->save();
                } else {
                    $access = new Acces;
                    $access->user = $users->id;
                    $access->kelola_akun = 0;
                    $access->kelola_barang = 1;
                    $access->transaksi = 1;
                    $access->kelola_laporan = 1;
                    $access->save();
                }

                Session::flash('create_success', 'Akun baru berhasil dibuat');

                return redirect('/account');
            } else if ($check_email != 0 && $check_username != 0) {
                Session::flash('both_error', 'Email dan username telah digunakan, silakan coba lagi');

                return back();
            } else if ($check_email != 0) {
                Session::flash('email_error', 'Email telah digunakan, silakan coba lagi');

                return back();
            } else if ($check_username != 0) {
                Session::flash('username_error', 'Username telah digunakan, silakan coba lagi');

                return back();
            }
        } else {
            return back();
        }
    }

    // Edit Account
    public function editAccount($id)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if ($check_access->kelola_akun == 1) {
            $user = User::find($id);

            return response()->json(['user' => $user]);
        } else {
            return back();
        }
    }

    // Update Account
    public function updateAccount(Request $req)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)
        ->first();
        if ($check_access->kelola_akun == 1) {
            $user_account = User::find($req->id);
            $check_email = User::all()
            ->where('email',
                $req->email
            )
            ->count();
            $check_username = User::all()
            ->where('username', $req->username)
            ->count();

            if (($req->foto != '' && $check_email == 0 && $check_username == 0) || ($req->foto != '' && $user_account->email == $req->email && $user_account->username == $req->username) || ($req->foto != '' && $check_email == 0 && $user_account->username == $req->username) || ($req->foto != '' && $user_account->email == $req->email && $check_username == 0)) {
                $user = User::find($req->id);
                $user->name = $req->nama;
                $user->level = $req->role;
                $foto = $req->file('foto');
                $user->foto = $foto->getClientOriginalName();
                $foto->move(public_path('pictures/'), $foto->getClientOriginalName());
                $user->email = $req->email;
                $user->username = $req->username;
                $user->save();

                Session::flash('update_success', 'Akun berhasil diubah');

                return redirect('/account');
            } else if (($req->foto == '' && $check_email == 0 && $check_username == 0) || ($req->foto == '' && $user_account->email == $req->email && $user_account->username == $req->username) || ($req->foto == '' && $check_email == 0 && $user_account->username == $req->username) || ($req->foto == '' && $user_account->email == $req->email && $check_username == 0)) {
                if ($req->nama_foto == 'default.jpg') {
                    $user = User::find($req->id);
                    $user->name = $req->nama;
                    $user->level = $req->role;
                    $user->foto = $req->nama_foto;
                    $user->email = $req->email;
                    $user->username = $req->username;
                    $user->save();
                } else {
                    $user = User::find($req->id);
                    $user->name = $req->nama;
                    $user->level = $req->role;
                    $user->email = $req->email;
                    $user->username = $req->username;
                    $user->save();
                }

                Session::flash('update_success', 'Akun berhasil diubah');

                return redirect('/account');
            } else if ($check_email != 0 && $check_username != 0 && $user_account->email != $req->email && $user_account->username != $req->username) {
                Session::flash('both_error', 'Email dan username telah digunakan, silakan coba lagi');

                return back();
            } else if ($check_email != 0 && $user_account->email != $req->email) {
                Session::flash('email_error', 'Email telah digunakan, silakan coba lagi');

                return back();
            } else if ($check_username != 0 && $user_account->username != $req->username) {
                Session::flash('username_error', 'Username telah digunakan, silakan coba lagi');

                return back();
            }
        } else {
            return back();
        }
    }

    // Delete Account
    // public function deleteAccount($id)
    // {
    //     $id_account = Auth::id();
    //     $check_access = Acces::where('user', $id_account)
    //     ->first();
    //     if ($check_access->kelola_akun == 1) {
    //         User::destroy($id);
    //         Acces::where('user', $id)->delete();

    //         Session::flash('delete_success', 'Akun berhasil dihapus');

    //         return back();
    //     } else {
    //         return back();
    //     }
    // }
    public function deleteAccount($id)
    {
        $id_account = Auth::id();
        $check_access = Acces::where('user', $id_account)->firstOrFail();

        if ($check_access->kelola_akun) {
            User::findOrFail($id)->delete();
            Acces::where('user', $id)->delete();

            session()->flash('delete_success', 'Akun berhasil dihapus');

            return back();
        }

        return back();
    }

}
