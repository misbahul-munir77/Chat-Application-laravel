<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use App\Events\GroupPesanTerkirim;

class GroupController extends Controller
{
    public function index() {
        $groups = DB::table('groups')->get();
        return view('user.group', compact('groups'));
    }

    public function group($id){
        $groups = DB::table('groups')->get();
        $groupDipilih = DB::table('groups')->where('id', $id)->first();

        $cek = DB::table('group_user')
            ->where('group_id', $id)
            ->where('user_id', Auth::id())
            ->exists();

        $pesanGroup = DB::table('group_messages')

        ->join('users', 'group_messages.pengirim_id', '=', 'users.id')

        ->where('group_id', $id)

        ->select(
        'group_messages.*',
        'users.name',
        'users.gambar')

        ->orderBy('created_at', 'asc')

        ->get();
        return view('user.group', compact('groups', 'groupDipilih', 'cek', 'pesanGroup'));
    }

    public function kirim(Request $request) {

        $pesan = [
            'group_id' => $request->group_id,
            'pengirim_id' => Auth::id(),
            'pesan' => $request->pesan,
            'created_at' => now(),
            'updated_at' => now()
        ];

        DB::table('group_messages')->insert($pesan);

        event(new GroupPesanTerkirim($pesan));

        return back();
    }

    public function buat() {
        return view('user.buatGroup');
    }
}
