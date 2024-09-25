<?php
//
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
//

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::get('transactions/credits', [TransactionController::class, 'credits'])->name('transactions.credits');
Route::get('transactions/debits', [TransactionController::class, 'debits'])->name('transactions.debits');


Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::view('about', 'about')->name('about');
    Route::view('about2', 'about2')->name('about2');
    // Route::view('credits', 'credits')->name('credits');
    // Route::view('debits', 'debits')->name('debits');
    //Route::view('/transactions', 'about')->name('transactions');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('transactions', TransactionController::class);
    
    // Custom routes for credits and debits


    // Route::get('transactions/credits', [TransactionController::class, 'credits']);
    // Route::get('transactions/debits', [TransactionController::class, 'debits']);


    // Define todo routes here




    // Define todo category routes here




    //Define comments (Activities or Messages) routes here



    
});