
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\DashboardController  as AdminDashboardController;
use App\Http\Controllers\Admin\typeController as AdmintypeController;

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
    return view('welcome');
});

//...
Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::resource('brands', AdminBrandController::class);
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('types', AdmintypeController::class);
});
