<?php
use App\Http\Controllers\AccountopenController;
use Illuminate\Support\Facades\Route;
use App\Models\Branch;

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
    return view('welcome');
});

// route

Route::get('demo',function()
{
    dd(Branch::all());
});
Route::get('/',[AccountopenController::class,'accountopen'])->name('account.open');
Route::post('acount-store',[AccountopenController::class,'account_store'])->name('account.store');
Route::get('get-city',[AccountopenController::class,'get_city'])->name('get.city');
Route::get('get-branch',[AccountopenController::class,'get_branch'])->name('get.branch');
Route::get('allaccount',[AccountopenController::class,'allaccount'])->name('my.allaccount');
Route::get('/exitform', function () {
    return view('account.allaccount');
});



