<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Middleware\FullyVerified;
use App\Http\Controllers\TravelController;
use App\Http\Middleware\RedirectIfUnverified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ModifeControlleur;
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

Route::middleware([RedirectIfUnverified::class])->group(function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/travels', [TravelController::class, 'show'])->name('travels.show');
    Route::get('/afficher/{id}', [TravelController::class,'afficher'])->name('afficher');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', FullyVerified::class])->name('dashboard');

Route::get('/panier', [PanierController::class, 'show'])->name('panier.show');
Route::get('/addpanier', [PanierController::class, 'addPanier'])->name('addpanier.addPanier');
Route::get('/panier/supprimer/{id}', [PanierController::class, 'supprimerProduit'])->name('panier.supprimer');

Route::get('/modife', [ModifeControlleur::class,'show'])->name('modife.show');

Route::middleware(['auth', FullyVerified::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/address', [UserAddressController::class, 'create'])->name('address.create');
    Route::patch('/address', [UserAddressController::class, 'edit'])->name('address.edit');
    Route::delete('/address', [UserAddressController::class, 'destroy'])->name('address.destroy');
});

Route::get('/file/{id}', [FileController::class, 'get_file'])->name('file');

require __DIR__.'/auth.php';
