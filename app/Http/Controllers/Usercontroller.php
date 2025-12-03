<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\MapelKelas;
use App\Models\Materi;
use App\Models\SiswaKelas;
use App\Models\Soal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    //
    public function index()
    {
        $data = User::all();
        $mapel = Mapel::all()->count();
        $kelas = Kelas::all()->count();

        return view('admin.dasboard', compact('data', 'mapel', 'kelas'));
    }




    // guru
    public function dataguru()
    {
        $data = User::where('level', 'guru')->get();
        return view('admin.guru.guruindex', compact('data'));
    }

    public function tambahguru()
    {
        return view('admin.guru.gurutambah');
    }

    public function posguru(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'jekel' => 'required',
            'password' => $request->id ? 'nullable' : 'required'
        ]);

        // Pengecekan apakah NIS sudah ada di database
        $existingNis = User::where('nis', $request->nis)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'nis' => 'NIS sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        // Pengecekan apakah Username sudah ada di database
        $existingUsername = User::where('username', $request->username)->first();
        if ($existingUsername && !$request->id) {
            return redirect()->back()->withErrors([
                'username' => 'Username sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        if ($request->id) {
            $user = User::findOrFail($request->id);
            $user->nis = $request->nis;
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->username = $request->username;
            $user->jekel = $request->jekel;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->level;
            $user->ayah;
            $user->ibu;
            $user->save();

            return redirect()->route('dataguru')->with('success', 'Data guru berhasil diperbaharui');
        }

        $user = new User();
        $user->nis = $request->nis;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->username = $request->username;
        $user->jekel = $request->jekel;
        $user->password = Hash::make($request->password);
        $user->level = 'guru';
        $user->ayah = '-';
        $user->ibu = '-';
        $user->save();

        return redirect()->route('dataguru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function editguru($id)
    {
        $user = User::findOrFail($id);
        return view('admin.guru.gurutambah', compact('user'));
    }

    public function hapusguru($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('dataguru')->with('success', 'Data guru berhasil dihapus');
    }





    // siswa
    public function datasiswa()
    {
        $data = User::where('level', 'siswa')->get();
        return view('admin.siswa.siswaindex', compact('data'));
    }

    public function tambahsiswa()
    {
        return view('admin.siswa.siswatambah');
    }

    public function possiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'jekel' => 'required',
            'password' => $request->id ? 'nullable' : 'required'
        ]);
        // Pengecekan apakah NIS sudah ada di database
        $existingNis = User::where('nis', $request->nis)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'nis' => 'NIS sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        // Pengecekan apakah Username sudah ada di database
        $existingUsername = User::where('username', $request->username)->first();
        if ($existingUsername && !$request->id) {
            return redirect()->back()->withErrors([
                'username' => 'Username sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        if ($request->id) {
            $user = User::findOrFail($request->id);
            $user->nis = $request->nis;
            $user->name = $request->name;
            $user->alamat = $request->alamat;
            $user->username = $request->username;
            $user->jekel = $request->jekel;
            // Update password hanya jika ada input password baru
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->level;
            $user->ayah;
            $user->ibu;
            $user->save();

            return redirect()->route('datasiswa')->with('success', 'Data guru berhasil diperbaharui');
        }

        $user = new User();
        $user->nis = $request->nis;
        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->username = $request->username;
        $user->jekel = $request->jekel;
        $user->password = Hash::make($request->password);
        $user->level = 'siswa';
        $user->ayah = '-';
        $user->ibu = '-';
        $user->save();

        return redirect()->route('datasiswa')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function editsiswa($id)
    {
        $user = User::findOrFail($id);
        return view('admin.siswa.siswatambah', compact('user'));
    }

    public function hapussiswa($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('datasiswa')->with('success', 'Data guru berhasil dihapus');
    }


    // mapel
    public function datamapel()
    {
        $data = Mapel::all();
        return view('admin.mapel.mapelindex', compact('data'));
    }

    public function tambahmapel()
    {
        return view('admin.mapel.mapeltambah');
    }

    public function posmapel(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',

        ]);
        // Pengecekan apakah NIS sudah ada di database
        $existingNis = Mapel::where('kodemapel', $request->kode)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'kode' => 'KODE sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        // Pengecekan apakah Username sudah ada di database
        $existingUsername = Mapel::where('namamapel', $request->nama)->first();
        if ($existingUsername && !$request->id) {
            return redirect()->back()->withErrors([
                'mapel' => 'MAPEL sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        if ($request->id) {
            $mapel = Mapel::findOrFail($request->id);
            $mapel->kodemapel = $request->kode;
            $mapel->namamapel = $request->nama;

            $mapel->save();

            return redirect()->route('datamapel')->with('success', 'Data mapel berhasil diperbaharui');
        }

        $mapel = new Mapel();
        $mapel->kodemapel = $request->kode;
        $mapel->namamapel = $request->nama;
        $mapel->save();

        return redirect()->route('datamapel')->with('success', 'Data mapel berhasil ditambahkan');
    }

    public function editmapel($id)
    {
        $user = Mapel::findOrFail($id);
        return view('admin.mapel.mapeltambah', compact('user'));
    }

    public function hapusmapel($id)
    {
        $user = Mapel::findOrFail($id);
        $user->delete();
        return redirect()->route('datamapel')->with('success', 'Data mapel berhasil dihapus');
    }








    // kelas
    public function datakelas()
    {
        $data = Kelas::all();
        $wali = User::all();
        $mapel = MapelKelas::all();
        $siswa = SiswaKelas::all();
        return view('admin.kelas.kelasindex', compact('data', 'wali', 'mapel', 'siswa'));
    }

    public function tambahkelas()
    {
        $wali = User::where('level', 'guru')->get();
        return view('admin.kelas.kelastambah', compact('wali'));
    }

    public function poskelas(Request $request)
    {
        $request->validate([
            'kodekelas' => 'required',
            'namakelas' => 'required',
            'wali' => 'required',

        ]);
        // Pengecekan apakah NIS sudah ada di database
        $existingNis = Kelas::where('kodekelas', $request->kodekelas)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'kode' => 'Kode Kelas sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        // Pengecekan apakah Username sudah ada di database
        $existingUsername = Kelas::where('namakelas', $request->namakelas)->first();
        if ($existingUsername && !$request->id) {
            return redirect()->back()->withErrors([
                'kelas' => 'Kelas sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        $existingkelas = Kelas::where('wali', $request->wali)->first();
        if ($existingkelas && !$request->id) {
            return redirect()->back()->withErrors([
                'wali' => 'Wali sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        if ($request->id) {
            $kelas = Kelas::findOrFail($request->id);
            $kelas->kodekelas = $request->kodekelas;
            $kelas->namakelas = $request->namakelas;
            $kelas->wali = $request->wali;

            $kelas->save();

            return redirect()->route('datakelas')->with('success', 'Data mapel berhasil diperbaharui');
        }

        $kelas = new Kelas();
        $kelas->kodekelas = $request->kodekelas;
        $kelas->namakelas = $request->namakelas;
        $kelas->wali = $request->wali;
        $kelas->save();

        return redirect()->route('datakelas')->with('success', 'Data mapel berhasil ditambahkan');
    }

    public function editkelas($id)
    {
        $user = Kelas::findOrFail($id);
        $wali = User::where('level', 'guru')->get();
        return view('admin.kelas.kelastambah', compact('user', 'wali'));
    }

    public function hapuskelas($id)
    {
        $user = Kelas::findOrFail($id);
        $user->delete();
        return redirect()->route('datakelas')->with('success', 'Data mapel berhasil dihapus');
    }



    public function daftarsiswa()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch the student's `id_kelas` from `SiswaKelas`
        $siswaKelas = SiswaKelas::where('siswa', $user->id)->first();

        if ($siswaKelas) {
            $data = SiswaKelas::where('id_kelas', $siswaKelas->id_kelas)->get();
            $kelas = $siswaKelas->id_kelas;
            $head = Kelas::find($kelas); // Detail kelas
            $siswa = User::where('level', 'siswa')->get();

            return view('admin.siswakelas.siswakelasindex', compact('data', 'head', 'kelas', 'siswa'));
        } else {
            // Jika siswa belum terdaftar di kelas
            return view('admin.siswakelas.siswakelasindex', [
                'data' => [],
                'head' => null,
                'kelas' => null,
                'siswa' => [],
                'message' => "Tidak ada kelas yang terdaftar atas namamu."
            ]);
        }
    }



    // show room kelas
    public function showRoomKelas()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch the student's `id_kelas` from `SiswaKelas`
        $siswaKelas = SiswaKelas::where('siswa', $user->id)->first();

        if ($siswaKelas) {
            // Get all subjects for the student's class
            $data = MapelKelas::where('id_kelas', $siswaKelas->id_kelas)->get();
            $head = Kelas::where('id', $siswaKelas->id_kelas)->first();
            $kelas = $siswaKelas->id_kelas;
            $mapel = Mapel::all();
            $materi = Materi::all();
            $guru = User::where('level', 'guru')->get();
            return view('admin.mapelkelas.mapelkelasindex', compact('data', 'head', 'kelas', 'mapel', 'guru', 'materi'));
        } else {
            return view('admin.mapelkelas.mapelkelasindex', [
                'data' => [],
                'head' => null,
                'kelas' => null,
                'mapel' => [],
                'guru' => [],
                'materi' => [],
                'message' => "Tidak ada kelas yang terdaftar atas namamu."
            ]);
        }
    }





    // mapel kelas
    public function datamapelkelas($id)
    {
        $data = MapelKelas::where('id_kelas', $id)->get();
        $kelas = $id;
        $head = Kelas::where('id', $kelas)->first();
        $mapel = Mapel::all();
        $materi = Materi::all();
        $guru = User::where('level', 'guru')->get();

        return view('admin.mapelkelas.mapelkelasindex', compact('data', 'kelas', 'materi', 'mapel', 'guru', 'head'));
    }

    public function tambahmapelkelas($id)
    {
        $wali = User::where('level', 'guru')->get();
        $mapel = Mapel::all();
        $kelass = $id;
        return view('admin.mapelkelas.mapelkelastambah', compact('wali', 'mapel', 'kelass'));
    }

    public function posmapelkelas(Request $request, $id)
    {
        $request->validate([
            'mapel' => 'required',
            'wali' => 'required',

        ]);

        $existingNis = MapelKelas::where('namamapel', $request->mapel)
            ->where('id_kelas', $request->id_kelas)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'kode' => 'Mapel sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        if ($request->id) {
            $kelas = MapelKelas::findOrFail($request->id);
            $kelas->namamapel = $request->mapel;
            $kelas->pengajar = $request->wali;
            $kelas->id_kelas = $id;

            $kelas->save();

            return redirect()->route('datamapelkelas', $id)->with('success', 'Data mapel berhasil diperbaharui');
        }

        $kelas = new MapelKelas();
        $kelas->namamapel = $request->mapel;
        $kelas->pengajar = $request->wali;
        $kelas->id_kelas = $id;
        $kelas->save();

        return redirect()->route('datamapelkelas', $id)->with('success', 'Data mapel berhasil ditambahkan');
    }

    public function editmapelkelas($id, $kelas)
    {
        $user = MapelKelas::findOrFail($id);
        $wali = User::where('level', 'guru')->get();
        $mapel = Mapel::all();
        $kelass = $kelas;
        return view('admin.mapelkelas.mapelkelastambah', compact('user', 'wali', 'mapel', 'kelass'));
    }

    public function hapusmapelkelas($id, $kelas)
    {
        $kelass = $kelas;
        $user = MapelKelas::findOrFail($id);
        $user->delete();
        return redirect()->route('datamapelkelas', $kelass)->with('success', 'Data mapel berhasil dihapus');
    }







    // siswa kelas
    public function datasiswakelas($id)
    {
        $data = SiswaKelas::where('id_kelas', $id)->get();
        $kelas = $id;
        $head = Kelas::where('id', $kelas)->first();
        $siswa = User::where('level', 'siswa')->get();
        return view('admin.siswakelas.siswakelasindex', compact('data', 'kelas', 'siswa', 'head'));
    }

    public function tambahsiswakelas($id)
    {
        $siswa = User::where('level', 'siswa')->get();
        $kelass = $id;
        return view('admin.siswakelas.siswakelastambah', compact('siswa',  'kelass'));
    }

    public function possiswakelas(Request $request, $id)
    {
        $request->validate([
            'siswa' => 'required',

        ]);

        $existingNis = SiswaKelas::where('siswa', $request->siswa)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'siswa' => 'Siswa sudah terdaftar, silakan gunakan yang lain.'
            ])->withInput();
        }

        if ($request->id) {
            $kelas = SiswaKelas::findOrFail($request->id);
            $kelas->siswa = $request->siswa;
            $kelas->id_kelas = $id;

            $kelas->save();

            return redirect()->route('datasiswakelas', $id)->with('success', 'Siswa berhasil diperbaharui');
        }

        $kelas = new SiswaKelas();
        $kelas->siswa = $request->siswa;
        $kelas->id_kelas = $id;
        $kelas->save();

        return redirect()->route('datasiswakelas', $id)->with('success', 'Siswa berhasil ditambahkan');
    }

    public function editsiswakelas($id, $kelas)
    {
        $user = SiswaKelas::findOrFail($id);
        $siswa = User::where('level', 'siswa')->get();
        $kelass = $kelas;
        return view('admin.siswakelas.siswakelastambah', compact('user', 'siswa',  'kelass'));
    }

    public function hapussiswakelas($id, $kelas)
    {
        $kelass = $kelas;
        $user = SiswaKelas::findOrFail($id);
        $user->delete();
        return redirect()->route('datasiswakelas', $kelass)->with('success', 'Siswa berhasil dihapus');
    }






    // materi
    public function datamateri($id, $mapel)
    {
        $data = Materi::where('id_kelas', $id)->where('id_mapelkelas', $mapel)->get();
        $kelas = $id;
        $mapel;
        $head = Kelas::where('id', $kelas)->first();
        return view('admin.materi.materiindex', compact('data', 'kelas', 'head', 'mapel'));
    }
    public function tambahmateri($id, $mapel)
    {
        $data = Materi::where('id_kelas', $id)->get();
        $kelas = $id;
        $mapel;
        return view('admin.materi.materitambah', compact('data',  'kelas', 'mapel'));
    }
    public function posmateri(Request $request, $id, $mapel)
    {
        $request->validate([
            'namamateri' => 'required',
            'file' => 'nullable|mimes:pdf,xlsx,xls,doc,docx,ppt',

        ]);

        $existingNis = Materi::where('namamateri', $request->namamateri)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'kode' => 'Materi sudah ada, silakan buat materi baru.'
            ])->withInput();
        }


        if ($request->id) {
            $materi = Materi::findOrFail($request->id);
            $materi->namamateri = $request->namamateri;
            if ($request->hasFile('file')) {
                $originalName = $request->file('file')->getClientOriginalName();
                $uniqueName = time() . '_' . $originalName;
                $request->file('file')->move(public_path('dokumen'), $uniqueName);
                $materi->file =  $uniqueName;
            }
            $materi->id_kelas = $id;
            $materi->id_mapelkelas = $mapel;

            $materi->save();

            return redirect()->route('datamateri', ['id' => $id, 'mapel' => $mapel])->with('success', 'Materi berhasil diperbaharui');
        }

        $materi = new Materi();
        $materi->namamateri = $request->namamateri;
        if ($request->hasFile('file')) {
            $originalName = $request->file('file')->getClientOriginalName();
            $uniqueName = time() . '_' . $originalName;
            $request->file('file')->move(public_path('dokumen'), $uniqueName);
            $materi->file =  $uniqueName;
        }
        $materi->id_kelas = $id;
        $materi->id_mapelkelas = $mapel;
        $materi->save();

        return redirect()->route('datamateri', ['id' => $id, 'mapel' => $mapel])->with('success', 'Materi berhasil ditambahkan');
    }
    public function editmateri($id, $mapel, $materi)
    {
        $user = Materi::findOrFail($materi);
        $kelas = $id;
        $mapel;
        return view('admin.materi.materitambah', compact('user', 'kelas',  'mapel'));
    }

    public function hapusmateri($id, $mapel, $materi)
    {
        $mapel;
        $materi;
        $user = Materi::findOrFail($materi);
        $user->delete();
        return redirect()->route('datamateri', ['id' => $id, 'mapel' => $mapel])->with('success', 'Siswa berhasil dihapus');
    }







    // jadwal
    public function datajadwal($id, $mapel)
    {
        $data = Jadwal::where('id_kelas', $id)->where('id_mapelkelas', $mapel)->get();
        $kelas = $id;
        $mapel;
        $head = Kelas::where('id', $kelas)->first();
        $now = Carbon::now();

        return view('admin.jadwal.jadwalindex', compact('data', 'kelas', 'head', 'mapel', 'now'));
    }
    public function tambahjadwal($id, $mapel)
    {
        $data = Jadwal::where('id_kelas', $id)->get();
        $kelas = $id;
        $mapel;
        return view('admin.jadwal.jadwaltambah', compact('data',  'kelas', 'mapel'));
    }
    public function posjadwal(Request $request, $id, $mapel)
    {
        $request->validate([
            'tgl_ujian' => 'required',
            'jam' => 'required',
            'menit' => 'required',
            'jenis_ujian' => 'required'

        ]);

        if (strtotime($request->tgl_ujian) < strtotime(date('Y-m-d'))) {
            return redirect()->back()->withErrors([
                'tgl_ujian' => 'Tanggal ujian tidak boleh lewat dari tanggal hari ini atau jadwal ujian telah lewat.'
            ])->withInput();
        }

        $existingNis = Jadwal::where('jenis_ujian', $request->jenis_ujian)->first();
        if ($existingNis && !$request->id) {
            return redirect()->back()->withErrors([
                'kode' => 'Jenis Ujian sudah ada, silakan buat Jenis Ujian baru.'
            ])->withInput();
        }

        if ($request->id) {
            $jadwal = Jadwal::findOrFail($request->id);
            $jadwal->jenis_ujian = $request->jenis_ujian;
            $jadwal->id_kelas = $id;
            $jadwal->id_mapelkelas = $mapel;
            $jadwal->jam = $request->jam;
            $jadwal->menit = $request->menit;
            $jadwal->tgl_ujian = $request->tgl_ujian;
            $jadwal->save();

            return redirect()->route('datajadwal', ['id' => $id, 'mapel' => $mapel])->with('success', 'Jadwal berhasil diperbaharui');
        }

        $jadwal = new Jadwal();
        $jadwal->jenis_ujian = $request->jenis_ujian;
        $jadwal->id_kelas = $id;
        $jadwal->id_mapelkelas = $mapel;
        $jadwal->jam = $request->jam;
        $jadwal->menit = $request->menit;
        $jadwal->tgl_ujian = $request->tgl_ujian;
        $jadwal->save();

        return redirect()->route('datajadwal', ['id' => $id, 'mapel' => $mapel])->with('success', 'Jadwal berhasil ditambahkan');
    }
    public function editjadwal($id, $mapel, $jadwal)
    {
        $user = Jadwal::findOrFail($jadwal);
        $kelas = $id;
        $mapel;
        return view('admin.jadwal.jadwaltambah', compact('user', 'kelas',  'mapel'));
    }

    public function hapusjadwal($id, $mapel, $jadwal)
    {

        $user = Jadwal::findOrFail($jadwal);
        $user->delete();
        return redirect()->route('datajadwal', ['id' => $id, 'mapel' => $mapel])->with('success', 'Jadwal berhasil dihapus');
    }







    // soal
    public function datasoal($id, $mapel, $jadwal)
    {
        $data = Soal::where('id_kelas', $id)->where('id_mapelkelas', $mapel)->where('id_jadwal', $jadwal)->get();
        $kelas = $id;
        $mapel;
        $head = Kelas::where('id', $kelas)->first();
        return view('admin.soal.soalindex', compact('data', 'kelas', 'head', 'mapel', 'jadwal'));
    }
    public function tambahsoal($id, $mapel, $jadwal)
    {
        $data = Jadwal::where('id_kelas', $id)->get();
        $kelas = $id;
        $mapel;
        return view('admin.soal.soaltambah', compact('data',  'kelas', 'mapel', 'jadwal'));
    }
    public function possoal(Request $request, $id, $mapel, $jadwal)
    {

        $request->validate([
            'pertanyaan' => 'required|string',
            'kunci' => 'required|in:A,B,C,D', // Hanya menerima A, B, C, atau D
            'a' => 'required|string',
            'b' => 'required|string',
            'c' => 'required|string',
            'd' => 'required|string',
        ]);

        // Cek apakah soal ini untuk update atau penambahan baru
        if ($request->id) {
            $soal = Soal::findOrFail($request->id);
            $soal->pertanyaan = $request->pertanyaan;
            $soal->id_kelas = $id;
            $soal->id_mapelkelas = $mapel;
            $soal->id_jadwal = $jadwal;
            $soal->kunci = $request->kunci;
            $soal->a = $request->a;
            $soal->b = $request->b;
            $soal->c = $request->c;
            $soal->d = $request->d;
            $soal->save();

            return redirect()->route('datasoal', ['id' => $id, 'mapel' => $mapel, 'jadwal' => $jadwal])->with('success', 'Soal berhasil diperbaharui');
        }

        // Menambahkan soal baru
        $soal = new Soal();
        $soal->pertanyaan = $request->pertanyaan;
        $soal->id_kelas = $id;
        $soal->id_mapelkelas = $mapel;
        $soal->id_jadwal = $jadwal;
        $soal->kunci = $request->kunci;
        $soal->a = $request->a;
        $soal->b = $request->b;
        $soal->c = $request->c;
        $soal->d = $request->d;
        $soal->save();

        return redirect()->route('datasoal', ['id' => $id, 'mapel' => $mapel, 'jadwal' => $jadwal])->with('success', 'Soal berhasil ditambahkan');
    }

    public function editsoal($id, $mapel, $jadwal, $soal)
    {
        $soal = Soal::findOrFail($soal);
        $kelas = $id;
        $mapel = $mapel;
        $jadwal = $jadwal;

        return view('admin.soal.soaltambah', compact('soal', 'kelas', 'mapel', 'jadwal'));
    }

    public function hapussoal($id, $mapel, $jadwal, $soal)
    {

        $user = Soal::findOrFail($soal);
        $user->delete();
        return redirect()->route('datasoal', ['id' => $id, 'mapel' => $mapel, 'jadwal' => $jadwal])->with('success', 'Soalberhasil dihapus');
    }







    // ujian
    public function ujian($id, $mapel, $jadwal)
    {
        $data = Soal::where('id_kelas', $id)->where('id_mapelkelas', $mapel)->where('id_jadwal', $jadwal)->get();
        $jadwal = Jadwal::where('id', $jadwal)->first();
        $kelas = $id;
        $mapel;
        $head = Kelas::where('id', $kelas)->first();
        $deadline = now()->addHours((int)$jadwal->jam)->addMinutes((int)$jadwal->menit)->timestamp;
        // dd($jadwal);
        // dd(now()->timezone('Asia/Makassar')->toDateTimeString());
        return view('admin.ujian.ujianindex', compact('data', 'kelas', 'head', 'mapel', 'jadwal', 'deadline'));
    }

    public function simpanHasil(Request $request, $id, $mapel, $jadwal)
    {
        // dd($request->all());
        $user = Auth::user();
        // Mengambil data soal berdasarkan ujian yang dimaksud
        $soals = Soal::where('id_kelas', $id)
            ->where('id_mapelkelas', $mapel)
            ->where('id_jadwal', $jadwal)
            ->get();

        // Inisialisasi variabel untuk menghitung skor
        $jumlahSoal = $soals->count();
        $jawabanBenar = 0;
        $jawabanSalah = 0;
        $jawabanKosong = 0;
        $skor = 0;

        // Mengiterasi soal dan mengecek jawaban
        foreach ($soals as $soal) {
            $userAnswer = $request->input("jawaban_{$soal->id}"); // Mendapatkan jawaban dari form

            // Menilai jawaban
            if (is_null($userAnswer)) {
                $jawabanKosong++;
            } elseif ($userAnswer == $soal->kunci) {
                $jawabanBenar++;
            } else {
                $jawabanSalah++;
            }
        }
        if ($jumlahSoal > 0) {
            $skor = ($jawabanBenar / $jumlahSoal) * 100; // Calculate the percentage score

            // Ensure the score is not more than 100
            $skor = min($skor, 100);
        }

        $soal = new Hasil();
        $soal->id_user = $user->id;
        $soal->id_kelas = $id;
        $soal->id_mapelkelas = $mapel;
        $soal->id_jadwal = $jadwal;
        $soal->jumlah_soal = $jumlahSoal;
        $soal->jawaban_benar = $jawabanBenar;
        $soal->jawaban_salah = $jawabanSalah;
        $soal->jawaban_kosong = $jawabanKosong;
        $soal->skor = $skor;
        $soal->save();

        // Mengarahkan ke halaman hasil ujian atau memberi respon sukses
        return redirect()->route('hasilujian', ['id' => $id, 'mapel' => $mapel, 'jadwal' => $jadwal])
            ->with('status', 'Hasil ujian telah disimpan!');
    }

    // Di controller untuk menampilkan hasil
    public function hasilUjian($id, $mapel, $jadwal)
    {
        $kelas = $id;
        $mapel;
        $user = User::all();
        $head = Kelas::where('id', $kelas)->first();
        $data = Hasil::where('id_kelas', $id)
            ->where('id_mapelkelas', $mapel)
            ->where('id_jadwal', $jadwal)
            ->where('id_user', Auth::id()) // Filter by logged-in user
            ->first();
        // dd($hasil);

        return view('admin.hasil.hasilindex', compact('data', 'head', 'user'));
    }

    public function datahasil($id, $mapel, $jadwal)
    {
        $user = User::all();
        $data = Hasil::where('id_jadwal', $jadwal)->get();;
        return view('admin.hasil.hasilindex', compact('data', 'user'));
    }
}
