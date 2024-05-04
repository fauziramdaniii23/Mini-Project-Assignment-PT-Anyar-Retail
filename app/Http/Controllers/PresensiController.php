<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function index(){
        $karyawan = Karyawan::all();
        $presensi =Presensi::all();
        // $today = Carbon::today();

        // $presensi = Presensi::whereDate('tanggal', $today)->get();
        return view('layout.presensi', ['karyawans' => $karyawan, 'presensi' => $presensi]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_pulang' => 'nullable|date_format:H:i',
            'id_karyawan' => 'required|exists:karyawans,id',
            'presensi_status' => 'required|in:Datang Awal,Tepat Waktu,Terlambat,Absen',
            'keterangan' => 'nullable|in:Izin,Sakit,Cuti,Alpha,Libur',
        ]);

        Presensi::create([
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
            'id_karyawan' => $request->id_karyawan,
            'presensi_status' => $request->presensi_status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Data presensi berhasil ditambahkan.');
    }

    public function update(Request $request, $id){
        
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable',
            'jam_pulang' => 'nullable',
            'id_karyawan' => 'required|exists:karyawans,id',
            'presensi_status' => 'required|in:Datang Awal,Tepat Waktu,Terlambat,Absen',
            'keterangan' => 'nullable|in:Izin,Sakit,Cuti,Alpha,Libur',
        ]);
        
        $presensi = Presensi::find($id);
        $presensi->update([
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_pulang' => $request->jam_pulang,
            'id_karyawan' => $request->id_karyawan,
            'presensi_status' => $request->presensi_status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Data presensi berhasil diperbarui');
    
    }

    public function delete($id){
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();
    
        return redirect()->back()->with('success', 'Presensi berhasil dihapus.');
        }
    
        public function absensi(){

            $absensi = DB::table('presensis')
                ->join('karyawans', 'presensis.id_karyawan', '=', 'karyawans.id')
                ->select('karyawans.nama_lengkap', 'presensis.id_karyawan', DB::raw('count(*) as total_absen'))
                ->where('presensi_status', 'Absen')
                ->groupBy('karyawans.nama_lengkap', 'presensis.id_karyawan')
                ->having('total_absen', '>', 3)
                ->get();
            
        
            return view('layout.absensi', ['absensi' => $absensi]);
        }

    public function presensiKaryawan($id){

        $presensiKaryawan = Presensi::where('id_karyawan', $id)->get();
        return view('layout.presensi.detailPresensi', ['presensiKaryawan' => $presensiKaryawan]);
    }

    public function cariPresensi(Request $request){

    $karyawan = Karyawan::all();

    $keyword = $request->input('keyword');

    $presensi = Presensi::where(function ($query) use ($keyword) {
        $query->where('tanggal', 'like', "%$keyword%")
            ->orWhere('jam_masuk', 'like', "%$keyword%")
            ->orWhere('jam_pulang', 'like', "%$keyword%")
            ->orWhere('presensi_status', 'like', "%$keyword%")
            ->orWhere('keterangan', 'like', "%$keyword%");
    })
    ->orWhereHas('karyawan', function ($query) use ($keyword) {
        $query->where('nama_lengkap', 'like', "%$keyword%");
    })
    ->get();

    // $presensi = Presensi::where('tanggal', 'like', "%$keyword%")
    //                     ->orWhere('jam_masuk', 'like', "%$keyword%")
    //                     ->orWhere('jam_pulang', 'like', "%$keyword%")
    //                     ->orWhere('presensi_status', 'like', "%$keyword%")
    //                     ->orWhere('keterangan', 'like', "%$keyword%")
    //                     ->get();

    return view('layout.presensi', ['karyawans' => $karyawan, 'presensi' => $presensi]);
    }
}
