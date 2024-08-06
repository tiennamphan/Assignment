<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{

    public function home()
{
    $totalProducts = Product::count();
    $totalCategories = Category::count();
    $totalUsers = User::count();

    return view('admin.home', compact('totalProducts', 'totalCategories', 'totalUsers'));
}

}
