<?php

use App\Models\Poppings;
use App\Models\BubbleTeas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BubbleTeaController;

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

Route::controller(SampleController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout', 'logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');
    Route::post('validate_login', 'validate_login')->name('sample.validate_login');
    Route::get('dashboard', 'dashboard')->name('dashboard');

    Route::get('search', 'searchBubbleTeaByName');
});

Route::get('/', function (Request $request) {
    // SearchBar
    $search = $request->input('search');
    $bubbleTea = BubbleTeas::where('name', 'like', '%' . $search . '%')
        ->orderBy('name');
    //
    return view('homepage', compact('bubbleTea'))->withuser($bubbleTea);
});

Route::get('/order', function () {
    $bubbleTea = BubbleTeas::all();
    $poppings = Poppings::all();
    return view('order', compact('bubbleTea', 'poppings'));
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/connected', function () {
    return view('connected');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/orderHistory', function () {
    return view('orderHistory');
});

Route::post('/cartAdd', [SessionController::class, 'addToCart']);

// USER ROUTES
Route::put("/updateProfil/{id}", [SampleController::class, 'updateProfil']);
Route::delete("/deleteProfil/{id}", [SampleController::class, 'deleteProfil']);

// ADMIN ROUTES
Route::get('admin', [SampleController::class, 'adminPage']);

// ADMIN BBT ROUTES
Route::post('createBbt', [AdminController::class, 'createBbt']);
Route::put("update/bbt/{id}", [AdminController::class, 'updateBbt']);
Route::delete("delete/bbt/{id}", [AdminController::class, 'deleteBbt']);

// ADMIN USER ROUTES
Route::delete("delete/user/{id}", [AdminController::class, 'deleteUser']);
Route::put("update/user/{id}", [AdminController::class, 'updateUser']);

// TEST CART
// Route::get('bubbleTea', "BubbleTeaController@show")->name('bubbleTea.show');
// Route::post('bubbleTea/add/{product}', "BubbleTeaController@add")->name('bubbleTea.add');
// Route::get('bubbleTea/remove/{product}', "BubbleTeaController@remove")->name('bubbleTea.remove');
// Route::get('bubbleTea/empty', "BubbleTeaController@empty")->name('bubbleTea.empty');
// Route::get('bubbleTea/empty', "BubbleTeaController@empty")->name('bubbleTea.empty');


Route::get('bubbleTea', [BubbleTeaController::class, "show"])->name('bubbleTea.show');
Route::post('bubbleTea/add/{product}', [BubbleTeaController::class, "add"])->name('bubbleTea.add');
Route::get('bubbleTea/remove/{product}', [BubbleTeaController::class, "remove"])->name('bubbleTea.remove');
Route::get('bubbleTea/empty', [BubbleTeaController::class, "empty"])->name('bubbleTea.empty');
