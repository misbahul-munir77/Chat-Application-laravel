<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use App\Events\GroupPesanTerkirim;

class GroupController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;

        $groups = DB::table('groups')
            ->where('nama_group', 'like', '%' . $search . '%')
            ->get();

        foreach($groups as $group){
            $pesan_terakhir = DB::table('group_messages')
               ->where('group_id', $group->id)
               ->latest()
               ->first();

            $group->pesanTerakhir = $pesan_terakhir
            ? $pesan_terakhir->pesan
            : 'Belum ada pesan';
        }

        return view('user.group', compact('groups', 'search'));
    }

    public function group($id){
        $groups = DB::table('groups')->get();

        foreach($groups as $group){
            $pesan_terakhir = DB::table('group_messages')
               ->where('group_id', $group->id)
               ->latest()
               ->first();

            $group->pesanTerakhir = $pesan_terakhir
            ? $pesan_terakhir->pesan
            : 'Belum ada pesan';
        }

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
        $users = DB::table('users')->where('id', '!=', Auth::id())->get();
        return view('user.buatGroup', compact('users'));
    }

    public function tambah(Request $request) {
        $request->validate([
            'nama_group' => 'required|string|max:255',
            'user_id' => 'required|array',
        ]);

        $grubMasuk = DB::table('groups')->insertGetId([
            'nama_group' => $request->nama_group,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('group_user')->insert([
            'group_id' => $grubMasuk,
            'user_id' => Auth::id()
        ]);


        foreach($request->user_id as $idUser){
            DB::table('group_user')->insert([
                'group_id' => $grubMasuk,
                'user_id' => $idUser
            ]);
        }
        return redirect('/group');
    }
}
