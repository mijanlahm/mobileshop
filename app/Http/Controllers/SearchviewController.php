<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class SearchviewController extends Controller
{
    public function search_show($id)
    {
        $post = product::findOrFail($id); // Find post by ID
        return view('home.searchshow', compact('post')); // Return the view for the full post
    }
}
