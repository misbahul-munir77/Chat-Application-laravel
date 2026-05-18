<?php

namespace App\Http\Controllers;

use App\Events\PesanTerkirim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        return view('user.dashboard', compact('users'));
    }

    public function chat($id) {
        $users = DB::table('users')->get();
        $userDipilih = DB::table('users')->where('id', $id)->first();

        $pesan = DB::table('message')
            ->where(function($query) use ($id){
                $query->where('pengirim_id', Auth::id())
                      ->where('penerima_id', $id);
            })

            ->orWhere(function($query) use ($id){
                $query->where('pengirim_id', $id)
                      ->where('penerima_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return view('user.dashboard', compact('users', 'userDipilih', 'pesan'));
    }

    public function kirim(Request $request) {
        $pesan = [
            'pengirim_id' => Auth::id(),
            'penerima_id' => $request->penerima_id,
            'pesan' => $request->pesan,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('message')->insert($pesan);

        event(new PesanTerkirim($pesan));

        return back();
    }
}
