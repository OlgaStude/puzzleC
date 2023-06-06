<?php

use App\Http\Controllers\forAllController;
use App\Models\Goods;
use Illuminate\Support\Facades\Artisan;
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
    Artisan::call('storage:link');
    return view('mainpage');
});


Route::get('good/{id}', function($id){
    Artisan::call('storage:link');
    $good = Goods::find($id);
    $more = Goods::where('id', '<>', $id)->paginate(4);
    return view('goddPage', compact('good', 'more'));
})->name('goodpage');
Route::get('addtokart', [forAllController::class, 'addtokart'])->name('addtokart');

Route::get('mainpage', function(){
    Artisan::call('storage:link');
    $goods = Goods::all();
    return view('mainpage', compact('goods'));
})->name('mainpage');