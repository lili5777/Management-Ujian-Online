<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/admin', function () {
//     return view('admin.dasboard');
// });
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [Usercontroller::class, 'index'])->name('masuk');

    // guru
    Route::get('/data-guru', [Usercontroller::class, 'dataguru'])->name('dataguru');
    Route::get('/tambah-guru', [Usercontroller::class, 'tambahguru'])->name('tambahguru');
    Route::post('/tambah-guru', [Usercontroller::class, 'posguru'])->name('posguru');
    Route::get('/edit-guru/{id}', [Usercontroller::class, 'editguru'])->name('editguru');
    Route::delete('/hapus-guru/{id}', [Usercontroller::class, 'hapusguru'])->name('hapusguru');

    // siswa
    Route::get('/data-siswa', [Usercontroller::class, 'datasiswa'])->name('datasiswa');
    Route::get('/tambah-siswa', [Usercontroller::class, 'tambahsiswa'])->name('tambahsiswa');
    Route::post('/tambah-siswa', [Usercontroller::class, 'possiswa'])->name('possiswa');
    Route::get('/edit-siswa/{id}', [Usercontroller::class, 'editsiswa'])->name('editsiswa');
    Route::delete('/hapus-siswa/{id}', [Usercontroller::class, 'hapussiswa'])->name('hapussiswa');

    // mapel
    Route::get('/data-mapel', [Usercontroller::class, 'datamapel'])->name('datamapel');
    Route::get('/tambah-mapel', [Usercontroller::class, 'tambahmapel'])->name('tambahmapel');
    Route::post('/tambah-mapel', [Usercontroller::class, 'posmapel'])->name('posmapel');
    Route::get('/edit-mapel/{id}', [Usercontroller::class, 'editmapel'])->name('editmapel');
    Route::delete('/hapus-mapel/{id}', [Usercontroller::class, 'hapusmapel'])->name('hapusmapel');


    // kelas
    Route::get('/data-kelas', [Usercontroller::class, 'datakelas'])->name('datakelas');
    Route::get('/tambah-kelas', [Usercontroller::class, 'tambahkelas'])->name('tambahkelas');
    Route::post('/tambah-kelas', [Usercontroller::class, 'poskelas'])->name('poskelas');
    Route::get('/edit-kelas/{id}', [Usercontroller::class, 'editkelas'])->name('editkelas');
    Route::delete('/hapus-kelas/{id}', [Usercontroller::class, 'hapuskelas'])->name('hapuskelas');


    // mapel kelas
    Route::get('/data-mapel-kelas/{id}', [Usercontroller::class, 'datamapelkelas'])->name('datamapelkelas');
    Route::get('/tambah-mapel-kelas/{id}', [Usercontroller::class, 'tambahmapelkelas'])->name('tambahmapelkelas');
    Route::post('/tambah-mapel-kelas/{id}', [Usercontroller::class, 'posmapelkelas'])->name('posmapelkelas');
    Route::get('/edit-mapel-kelas/{id}/{kelas}', [Usercontroller::class, 'editmapelkelas'])->name('editmapelkelas');
    Route::delete('/hapus-mapel-kelas/{id}/{kelas}', [Usercontroller::class, 'hapusmapelkelas'])->name('hapusmapelkelas');


    // siswa kelas
    Route::get('/data-siswa-kelas/{id}', [Usercontroller::class, 'datasiswakelas'])->name('datasiswakelas');
    Route::get('/tambah-siswa-kelas/{id}', [Usercontroller::class, 'tambahsiswakelas'])->name('tambahsiswakelas');
    Route::post('/tambah-siswa-kelas/{id}', [Usercontroller::class, 'possiswakelas'])->name('possiswakelas');
    Route::get('/edit-siswa-kelas/{id}/{kelas}', [Usercontroller::class, 'editsiswakelas'])->name('editsiswakelas');
    Route::delete('/hapus-siswa-kelas/{id}/{kelas}', [Usercontroller::class, 'hapussiswakelas'])->name('hapussiswakelas');


    // materi
    Route::get('/data-materi/{id}/{mapel}', [Usercontroller::class, 'datamateri'])->name('datamateri');
    Route::get('/tambah-materi/{id}/{mapel}', [Usercontroller::class, 'tambahmateri'])->name('tambahmateri');
    Route::post('/tambah-materi/{id}/{mapel}', [Usercontroller::class, 'posmateri'])->name('posmateri');
    Route::get('/edit-materi/{id}/{mapel}/{materi}', [Usercontroller::class, 'editmateri'])->name('editmateri');
    Route::delete('/hapus-materi/{id}/{mapel}/{materi}', [Usercontroller::class, 'hapusmateri'])->name('hapusmateri');


    // jadwal
    Route::get('/data-jadwal/{id}/{mapel}', [Usercontroller::class, 'datajadwal'])->name('datajadwal');
    Route::get('/tambah-jadwal/{id}/{mapel}', [Usercontroller::class, 'tambahjadwal'])->name('tambahjadwal');
    Route::post('/tambah-jadwal/{id}/{mapel}', [Usercontroller::class, 'posjadwal'])->name('posjadwal');
    Route::get('/edit-jadwal/{id}/{mapel}/{jadwal}', [Usercontroller::class, 'editjadwal'])->name('editjadwal');
    Route::delete('/hapus-jadwal/{id}/{mapel}/{jadwal}', [Usercontroller::class, 'hapusjadwal'])->name('hapusjadwal');


    // soal
    Route::get('/data-soal/{id}/{mapel}/{jadwal}', [Usercontroller::class, 'datasoal'])->name('datasoal');
    Route::get('/tambah-soal/{id}/{mapel}/{jadwal}', [Usercontroller::class, 'tambahsoal'])->name('tambahsoal');
    Route::post('/tambah-soal/{id}/{mapel}/{jadwal}', [Usercontroller::class, 'possoal'])->name('possoal');
    Route::get('/edit-soal/{id}/{mapel}/{jadwal}/{soal}', [Usercontroller::class, 'editsoal'])->name('editsoal');
    Route::delete('/hapus-soal/{id}/{mapel}/{jadwal}/{soal}', [Usercontroller::class, 'hapussoal'])->name('hapussoal');



    // untuk siswa
    Route::get('/room-kelas', [Usercontroller::class, 'showRoomKelas'])->name('showRoomKelas');
    Route::get('/daftar-siswa', [Usercontroller::class, 'daftarsiswa'])->name('daftarsiswa');

    // mengerjakan ujian
    // soal
    Route::get('/ujian/{id}/{mapel}/{jadwal}', [Usercontroller::class, 'ujian'])->name('ujian');
    Route::post('/ujian/{id}/{mapel}/{jadwal}', [UserController::class, 'simpanHasil'])->name('posujian');
    Route::get('/hasil-ujian/{id}/{mapel}/{jadwal}', [UserController::class, 'hasilUjian'])->name('hasilujian');


    //hasil pada admin
    Route::get('/data-hasil-ujian/{id}/{mapel}/{jadwal}', [UserController::class, 'datahasil'])->name('datahasil');
});
