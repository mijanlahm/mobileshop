<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query'); // Get search query
        $results = [];

        if ($query) {
            // Perform search on the posts table, adjusting for your needs
            $results = product::where('product_name', 'like', "%{$query}%")
                ->orWhere('product_short_des', 'like', "%{$query}%") // Add other fields as needed
                ->get(); 
        }

        return view('home.searchresults', compact('results', 'query'));
    }
}
