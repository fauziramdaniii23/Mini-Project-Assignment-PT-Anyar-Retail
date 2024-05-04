<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(){
        $user =User::all();
        $karyawan = Karyawan::all();
        return view('layout.karyawan', ['users' => $user, 'karyawans' => $karyawan]);
    }
    public function store(Request $request){
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'cabang' => 'required|in:Bandung,Garut,Sukabumi,Cianjur',
            'organisasi' => 'required|in:Operasional,Supporting',
            'jabatan' => 'required|in:Staff IT,Spv IT,Manager IT,Direktur Umum',
            'level_jabatan' => 'required|in:Staff,Spv,Manager,Direktur',
            'id_user' => 'required|exists:users,id',
        ]);
    
        $tahun = date('Y');
        $bulan = date('m');
    
        $userId = $request->id_user;
    
        $nomorIndukKaryawan = $tahun  . $bulan  . $userId;
    
        $karyawan = new Karyawan([
        'nama_lengkap' => $request->nama_lengkap,
        'alamat' => $request->alamat,
        'cabang' => $request->cabang,
        'organisasi' => $request->organisasi,
        'jabatan' => $request->jabatan,
        'level_jabatan' => $request->level_jabatan,
        'id_user' => $userId,
        'nomor_induk_karyawan' => $nomorIndukKaryawan,
        ]);
        $karyawan->save();
    
        return redirect('/dashboard')->with('success', 'Data karyawan berhasil ditambahkan.');
    
    }

    public function update(Request $request, $id){
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'alamat' => 'required|string',
        'cabang' => 'required|in:Bandung,Garut,Sukabumi,Cianjur',
        'organisasi' => 'required|in:Operasional,Supporting',
        'jabatan' => 'required|in:Staff IT,Spv IT,Manager IT,Direktur Umum',
        'level_jabatan' => 'required|in:Staff,Spv,Manager,Direktur',
        'id_user' => 'required|exists:users,id',
    ]);

    $karyawan = Karyawan::find($id);
    $karyawan->update([
        'nama_lengkap' => $request->nama_lengkap,
        'alamat' => $request->alamat,
        'cabang' => $request->cabang,
        'organisasi' => $request->organisasi,
        'jabatan' => $request->jabatan,
        'level_jabatan' => $request->level_jabatan,
        'id_user' => $request->id_user,
    ]);

    return redirect()->back()->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function delete($id){
    $karyawan = Karyawan::findOrFail($id);
    $karyawan->delete();

    return redirect('/dashboard')->with('success', 'Karyawan berhasil dihapus.');
    }

    public function cariKaryawan(Request $request){
        $user = User::all();
    $keyword = $request->input('keyword');

    $karyawan = Karyawan::where('nama_lengkap', 'like', "%$keyword%")
                        ->orWhere('nomor_induk_karyawan', 'like', "%$keyword%")
                        ->orWhere('alamat', 'like', "%$keyword%")
                        ->orWhere('cabang', 'like', "%$keyword%")
                        ->orWhere('organisasi', 'like', "%$keyword%")
                        ->orWhere('jabatan', 'like', "%$keyword%")
                        ->orWhere('level_jabatan', 'like', "%$keyword%")
                        ->get();

    return view('layout.karyawan', ['users' => $user,'karyawans' => $karyawan]);
}

}
