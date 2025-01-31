<?php

use App\Http\Controllers\BotmanController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Middleware\FullyVerified;
use App\Http\Controllers\TravelController;
use App\Http\Middleware\RedirectIfUnverified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WineRoadController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Dashboard\ServiceVenteController;
use App\Http\Controllers\Dashboard\DirigeantController;
use App\Http\Controllers\CommandeClientController;
use Illuminate\Support\Facades\URL;

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

Route::get('/travels', [TravelController::class, 'show'])->name('travels.show');

Route::middleware([RedirectIfUnverified::class])->group(function() {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/travel/{id}', [TravelController::class, 'show_single'])->name('travel.show');

    Route::get('/commande_client', [CommandeClientController::class, 'show'])->name('commandes_client.show');
    Route::get('/commande_client/{id}', [CommandeClientController::class, 'show_single'])->name('commande_client.show');
    // Route pour mettre à jour l'état de la commande et envoyer l'email
    Route::post('/order/{id}/update', [CommandeClientController::class, 'updateOrder'])->name('order.update');


    Route::get('/order', [OrderController::class, 'show'])->name('order.show');
    Route::post('/order/travel/{id}', [OrderController::class, 'edit'])->name('travel.edit'); // used both for editing and adding
    Route::post('/order', [OrderController::class, 'update_booking'])->name('order.update_booking');
    Route::post('/order/remove_booking', [OrderController::class, 'remove_booking'])->name('order.booking.remove');
});

Route::get('/partner/{id}', [PartnerController::class, 'show_single'])->name('partner.show');

Route::match(['get', 'post'], '/botman', [BotmanController::class, 'handle']);


Route::middleware(['auth', FullyVerified::class])->group(function () {
    Route::get('/process-order/address', [OrderController::class, 'show_address'])->name('order.process.address.show');
    Route::post('/process-order/address', [OrderController::class, 'process_address'])->name('order.process.address');

    Route::get('/process-order/agreements', [OrderController::class, 'show_agreements'])->name('order.process.agreements.show');
    Route::post('/process-order/agreements', [OrderController::class, 'process_agreements'])->name('order.process.agreements');

    Route::get('/process-order/confirmation', [OrderController::class, 'show_confirmation'])->name('order.process.confirmation.show');
    Route::post('/process-order/confirmation', [OrderController::class, 'process_confirmation'])->name('order.process.confirmation');

    Route::get('/process-order/thanks', [OrderController::class, 'show_thanks'])->name('order.thanks.show');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/address', [UserAddressController::class, 'create'])->name('address.create');
    Route::patch('/address', [UserAddressController::class, 'edit'])->name('address.edit');
    Route::delete('/address', [UserAddressController::class, 'destroy'])->name('address.destroy');

    Route::get('/order/history', [OrderController::class, 'show_history'])->name('order.history.show');





    Route::post('/dashboard/service_vente/ajouterhotel', [ServiceVenteController::class, 'createPartenaire'])->name('dashboard.vente.Partenaire.create');
    Route::get('/dashboard/service_vente/ajouterhotel', [ServiceVenteController::class, 'afficherPagePartenaire'])->name('dashboard.vente.Partenaire.afficher');

    Route::get('/dashboard/service_vente/sejour', [ServiceVenteController::class, 'afficherPageSejour'])->name('dashboard.vente.Sejour.afficher');
    Route::post('/dashboard/service_vente/sejour', [ServiceVenteController::class, 'modifierSejour'])->name('dashboard.vente.Sejour.modifier');

    Route::get('/dashboard/service_vente', [ServiceVenteController::class, 'showHomepage'])->name('dashboard.vente.homepage.show');



    Route::post('/dashboard/dirigeant/createTravel', [DirigeantController::class,'EnrengistrerTravel'])->name('dashboard.dirigeant.create.Travel');
    Route::get('/dashboard/dirigeant/createTravel', [DirigeantController::class,'createTravel'])->name('dashboard.dirigeant.create.Travel');
    Route::get('/dashboard/dirigeant/validateTravel', [DirigeantController::class,'validateTravel'])->name('dashboard.dirigeant.validate.Travel');
    Route::post('/dashboard/dirigeant/actualiserTravel', [DirigeantController::class,'actualiserTravel'])->name('dashboard.dirigeant.actualiserTravel');
    Route::get('/dashboard/affiche',[DirigeantController::class, 'affiche'])->name('dashboard.affiche');

    Route::get('/dashboard/service_vente/hotel', [ServiceVenteController::class, 'afficherPageHotel'])->name('dashboard.vente.hotel');
});


Route::get('/help', function() {
    return view('mainHelp');
})->name('mainHelp');

Route::get('/file/{id}', [FileController::class, 'get_file'])->name('file');

Route::get('/contact', function() {
    return view('policies.contact');
})->name('contact');

Route::get('/policies/terms', function() {
    return view('policies.terms');
})->name('policies.terms');

Route::get('/policies/cookies', function() {
    return view('policies.cookies');
})->name('policies.cookies');

Route::get('/policies/privacy', function() {
    return view('policies.privacy');
})->name('policies.privacy');


require __DIR__.'/auth.php';

Route::get('/wine-roads', [WineRoadController::class, 'index'])->name('wine-road.index');
Route::get('/wine-roads/{id}', [WineRoadController::class, 'show'])->name('wine-road.show');


//initialisation des role
Route::get('/service_vente', function () {
    return view('service_vente.dashboard');
})->middleware('role:service_vente');

Route::get('/directeur_service_vente', function () {
    return view('directeur_service_vente.dashboard');
})->middleware('role:directeur_service_vente');

Route::get('/service_marketing', function () {
    return view('service_marketing.dashboard');
})->middleware('role:service_marketing');

Route::get('/dirigeant', function () {
    return view('dirigeant.dashboard');
})->middleware('role:dirigeant');

$proxy_url    = getenv('PROXY_URL');
$proxy_scheme = getenv('PROXY_SCHEME');

if (!empty($proxy_url)) {
   URL::forceRootUrl($proxy_url);
}

if (!empty($proxy_schema)) {
   URL::forceScheme($proxy_scheme);
}
