<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home_final(){
        $subcategoryId = 7; // Example subcategory ID
        $Mobiles = Product::where('product_subcategory_id', $subcategoryId)->orderBy('id', 'desc')->take(3)->get();

        $subcategoryId = 9; // Example subcategory ID
        $TVs = Product::where('product_subcategory_id', $subcategoryId)->orderBy('id', 'desc')->take(3)->get();


        $subcategoryId = 5; // Example subcategory ID
        $Computers = Product::where('product_subcategory_id', $subcategoryId)->orderBy('id', 'desc')->take(3)->get();
        return view('home.home', compact('Mobiles', 'Computers', 'TVs'));
    }
}
