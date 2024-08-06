<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){


        $descProducts = DB::table('products')
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();



        $categories = DB::table('categories')->get();

        return view('user.home', compact('descProducts','categories'));
    }
}
