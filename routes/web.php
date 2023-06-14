<?php

use App\Http\Controllers\forAllController;
use App\Http\Requests\paymentRequest;
use App\Models\Goods;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
    $goods = Goods::all();
    return view('mainpage', compact('goods'));
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

Route::get('cart', function(){
    $goods = Goods::where('in_the_kart', '=', 1)->get();
    $counter = Goods::where('in_the_kart', '=', 1)->count();
    return view('cart', compact('goods', 'counter'));
})->name('cart');
Route::get('deletecart', [forAllController::class, 'delete'])->name('deletecart');

Route::get('checkright', [forAllController::class, 'checkright'])->name('checkright');
Route::get('payment', function(){
    return view('paymentPage');
})->name('payment');
Route::get('operation', function(paymentRequest $req){
    Goods::where("id", 1)->update(["in_the_kart" => 0]);
    Goods::where("id", 2)->update(["in_the_kart" => 0]);
    Goods::where("id", 3)->update(["in_the_kart" => 0]);
    Goods::where("id", 4)->update(["in_the_kart" => 0]);
    Goods::where("id", 5)->update(["in_the_kart" => 0]);
    Goods::where("id", 6)->update(["in_the_kart" => 0]);
    Goods::where("id", 7)->update(["in_the_kart" => 0]);
    Goods::where("id", 8)->update(["in_the_kart" => 0]);
    Goods::where("id", 9)->update(["in_the_kart" => 0]);
    Goods::where("id", 10)->update(["in_the_kart" => 0]);
    Goods::where("id", 11)->update(["in_the_kart" => 0]);
    Goods::where("id", 12)->update(["in_the_kart" => 0]);
    
    $success_message = $req->session()->put('success_message', 'Покупка успешна!');
    return redirect()->back()->with($success_message);
})->name('operation');


Route::post('register', [forAllController::class, 'addUser'])->name('registration');
Route::post('login', [forAllController::class, 'loginUser'])->name('login');
Route::get('logout', function () {
    Auth::logout();
    return redirect('mainpage');
})->name('logout');