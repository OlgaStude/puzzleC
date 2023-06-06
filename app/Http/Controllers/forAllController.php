<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class forAllController extends Controller
{
    public function addtokart(Request $req){
        Goods::where("id", $req->id)->update(["in_the_kart" => 1]);
    }
}
