<?php
use App\Http\Controllers\CMenageController;
use App\Http\Controllers\DescendentController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

// for blogwriters
Route::group(['middleware' => ['auth', 'role:blogwriter']], function() { 
    Route::get('/dashboard/postcreate', 'App\Http\Controllers\DashboardController@postcreate')->name('dashboard.postcreate');
});
Route::resource('/ChefM',CMenageController::class);
Route::post('/ChefM/chercher',[CMenageController::class,'chercher'])->name('ChefM.chercher');
Route::resource('Cotisation',CotisationController::class);
Route::post('/ChefM/modifier',[CMenageController::class,'modifier'])->name('ChefM.modifier');
Route::get('/Liste/{id}',[CMenageController::class,'liste'])->name('Liste');
Route::resource('/Descendent',DescendentController::class);
Route::resource('Notification',NotificationController::class);
Route::post('/Descendent/modifier',[DescendentController::class,'modifier'])->name('Descendent.modifier');
Route::get('descendants/majeur',[DescendentController::class,'dmajeur'])->name('descendent.dmajeur');


Route::post('chef/cotisation',[CotisationController::class,'chercher'])->name('chef_cotisation.chercher');
require __DIR__.'/auth.php';
