<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class ProductController extends Controller
{
    //User
    public function index()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')
            ->get();
        return view('user.products.index', compact('products', 'categories'));
    }

    public function showCategory($id)
    {
        $category = DB::table('categories')->find($id);
        $categories = DB::table('categories')->get();
        $products = DB::table('products')
            ->where('products.category_id', $id)
            ->get();
        return view('user.products.category', compact('products', 'categories', 'category'));
    }

    public function showProduct($id)
    {
        $category = DB::table('categories')->find($id);
        $products = DB::table('products')
            ->where('products.id', $id)
            ->first();
        return view('user.products.show', compact('products', 'category'));
    }
}
