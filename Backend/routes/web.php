<?php

use App\Models\Guru;
use App\Models\Post;
use App\Models\galery;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\galeryController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KegiatanController;


Route::get('/', function () {
    $galeris = galery::all();
    $pengumumans = Post::all();
    $kegiatans = Kegiatan::all();
    return view('home',compact('galeris','pengumumans','kegiatans'));
});

Route::get('/home', function () {
    $galeris = galery::all();
    $pengumumans = Post::all();
    $kegiatans = Kegiatan::all();
    return view('home',compact('galeris','pengumumans','kegiatans'));
})->name('home');

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/berita', function () {
    $pengumumans = Post::all();
    return view('berita',compact('pengumumans'));
});

Route::get('/kegiatan', function () {
    $kegiatans = Kegiatan::all();
    return view('kegiatan',compact('kegiatans'));
});

Route::get('/gallery', function () {
    $galeris = galery::all();
    return view('gallery',compact('galeris'));
});

Route::get ('/layanan',[LayananController::class,'index'])->name('layanan.index');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
Route::patch('/pengaduan/{id}/update-status', [LayananController::class, 'update'])->name('pengaduan.updateStatus');


Route::get ('/login',[LoginController::class,'index'])-> name('login')->middleware('guest');
Route::post ('/login',[LoginController::class,'authenticate']);
Route::post ('/logout',[LoginController::class,'logout']);

Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard.index');
Route::get('/dashboard/edit', [GuruController::class, 'edit'])->name('dashboard.edit');
Route::post('/dashboard/update', [GuruController::class, 'update'])->name('dashboard.update');


    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard.index');
Route::get('/dashboard/editsiswa', [SiswaController::class, 'editsiswa'])->name('dashboard.editsiswa'); 
Route::post('/dashboard/updatesiswa', [SiswaController::class, 'updatesiswa'])->name('dashboard.updatesiswa');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/pembuatan', [AdminController::class, 'index']);
    Route::get('/dashboard/pembuatan/create-user', [AdminController::class, 'createUser'])->name('admin.createUser');
    Route::post('/dashboard/pembuatan/store-user', [AdminController::class, 'storeUser'])->name('admin.storeUser');
});

Route::middleware(['auth', 'role:guru,admin'])->group(function () {
//galery
    Route::get ('/dashboard/Mypost',[galeryController::class,'index'])->name('dashboard.Mypost.index');
    Route::post('/create-galery', [galeryController::class, 'store']);
    
    Route::delete('/delete-galery/{id}', [galeryController::class, 'destroy']);
Route::get('/dashboard/Mypost/galery/{galeri}/edit', [galeryController::class, 'edit']);
    // Rute untuk memperbarui galeri
Route::put('/dashboard/Mypost/galery/{galeri}', [galeryController::class, 'update']);

//kegiatan
    Route::get ('/dashboard/Mypost',[KegiatanController::class,'index'])->name('dashboard.Mypost.index');
                
    Route::delete('/delete-kegiatan/{id}', [KegiatanController::class, 'destroy']);
    Route::post('/create-kegiatan', [KegiatanController::class, 'store']);
     // Rute untuk memperbarui galeri
    Route::put('/dashboard/Mypost/kegiatan/{kegiatan}', [KegiatanController::class, 'update']);
    Route::get('/dashboard/Mypost/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit']);

//blog
    Route::get ('/dashboard/Mypost',[blogController::class,'index'])->name('dashboard.Mypost.index');
    Route::post('/create-post', [blogController::class, 'store']);
   
    Route::delete('/delete-post/{id}', [blogController::class, 'destroy']);
    Route::put('/dashboard/Mypost/detail/{pengumuman}', [blogController::class, 'update']);
    Route::get('/dashboard/Mypost/detail/{pengumuman}/edit', [blogController::class, 'edit']);
});

Route::get('/dashboard/Mypost/galery/{id}', [galeryController::class, 'show']);              
Route::get('/dashboard/Mypost/kegiatan/{id}', [KegiatanController::class, 'show']);  Route::get('/dashboard/Mypost/detail/{id}', [blogController::class, 'show']);