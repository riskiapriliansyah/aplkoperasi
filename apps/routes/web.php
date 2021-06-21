<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KategoriContoller;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SliderController;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/tes', function () {
    $detail = [
        'nama' => 'Riski',
        'alamat' => 'tes',
        'nia' => 'tes',
        'nik' => 'tes',
        'no_kk' => 'tes',
    ];
    $pdf = \PDF::loadView('pdf.pendaftaranPDF', ['detail' => $detail]);
    return $pdf->output();
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kegiatan/{kegiatan:slug}', [HomeController::class, 'showKegiatan'])->name('kegiatan.show');
Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visiMisi');
Route::get('/struktur-organisasi', [HomeController::class, 'pdfViewer'])->name('struktur.pdf');


Route::get('/pendaftaran', [PendaftarController::class, 'indexHome'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftarController::class, 'store'])->name('pendaftaran.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/pendaftaran-anggota', [PendaftarController::class, 'index'])->name('admin.pendaftar');
    Route::get('/pendaftaran-anggota/{pendaftar}', [PendaftarController::class, 'konfirmasi'])->name('admin.pendaftar.konfirmasi');
    Route::post('/pendaftaran-anggota/{pendaftar}', [PendaftarController::class, 'konfirm'])->name('admin.pendaftar.konfirm');

    Route::get('/anggota', [AnggotaController::class, 'index'])->name('admin.anggota');
    Route::get('/anggota/cetak', [AnggotaController::class, 'cetak'])->name('admin.anggota.cetak');
    Route::get('/anggota/{anggota}', [AnggotaController::class, 'show'])->name('admin.anggota.show');
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('admin.anggota.store');
    Route::patch('/anggota/{anggota}/update', [AnggotaController::class, 'update'])->name('admin.anggota.update');
    Route::patch('/anggota/{anggota}/updateKK', [AnggotaController::class, 'updateKK'])->name('admin.anggota.updateKK');
    Route::post('/anggota/{anggota}/store', [AnggotaController::class, 'keluargaStore'])->name('admin.anggota.keluarga.store');

    Route::get('/bidang', [BidangController::class, 'index'])->name('admin.bidang');
    Route::get('/bidang/{bidang}', [BidangController::class, 'show'])->name('admin.bidang.show');
    Route::post('/bidang/{bidang}', [BidangController::class, 'store'])->name('admin.bidang.store');
    Route::post('/bidang/{bidang}/{anggota}', [BidangController::class, 'deleteBidang'])->name('admin.bidang.delete');

    Route::get('/kk', [AnggotaController::class, 'indexKk'])->name('admin.kk');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('admin.kategori.show');

    Route::get('/event', [KategoriController::class, 'indexEvent'])->name('admin.event');
    Route::get('/event/{kategori}', [KategoriController::class, 'showEvent'])->name('admin.event.show');

    Route::get('/kas', [KasController::class, 'index'])->name('admin.kas');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::post('/laporan/pdf', [LaporanController::class, 'pdf'])->name('admin.laporan.pdf');

    Route::get('/config', [ConfigController::class, 'index'])->name('admin.config');

    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/gallery/{id}', [GalleryController::class, 'show'])->name('admin.gallery.show');
    Route::patch('/admin/gallery/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');

    Route::get('/admin/slider', [SliderController::class, 'index'])->name('admin.slider');
    Route::post('/admin/slider', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('/admin/slider-mini', [SliderController::class, 'indexMini'])->name('admin.sliderMini');
    Route::post('/admin/slider-mini', [SliderController::class, 'storeMini'])->name('admin.sliderMini.store');

    Route::get('/config/web', [ConfigController::class, 'indexWeb'])->name('admin.config.web');
    Route::patch('/config/web', [ConfigController::class, 'updateWeb'])->name('admin.config.web.update');

    Route::get('/admin/kegiatan', [KegiatanController::class, 'index'])->name('admin.kegiatan');
    Route::post('/admin/kegiatan', [KegiatanController::class, 'store'])->name('admin.kegiatan.store');
    Route::delete('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'delete'])->name('admin.kegiatan.delete');
    Route::get('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'edit'])->name('admin.kegiatan.edit');
    Route::patch('/admin/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('admin.kegiatan.update');
    Route::post('/admin/kegiatan/upload/image', [KegiatanController::class, 'uploadImage'])->name('admin.kegiatan.upload.image');

    Route::get('/bantuan', function () {
        return view('bantuan');
    })->name('bantuan');
});
