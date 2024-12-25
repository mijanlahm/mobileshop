<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function all_subcategory(){
        $allsubcategories = subcategory::latest()->get();
        return view('admin.allsubcategory', compact('allsubcategories'));
    }

    public function add_subcategory(){
        $categories = category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }

    public function store_subcategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => ['required', 'exists:categories,id']
        ]);

        $category_id = $request->category_id;
        $category_name = category::where('id', $category_id)->value('category_name');

        subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
            'category_id' => $category_id,
            'category_name' => $category_name
        ]);

        category::where('id', $category_id)->increment('subcategory_count',1);

        return redirect()->route('allsubcategory')->with('message', 'Subcategory Added Successfully!');
    }

    public function edit_subcategory($id){
        $subcategory_info = subcategory::findOrFail($id);
        return view('admin.editsubcategory', compact('subcategory_info'));
    }

    public function update_subcategory(Request $request){
        
        $subcategory_id = $request->subcategory_id;
        
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories'
        ]);

        subcategory::findOrFail($subcategory_id)->update([
            
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name))
       
        ]);

        return redirect()->route('allsubcategory')->with('message', 'Subcategory updated Successfully!');
    }

    public function delete_subcategory($id){
        $cat_id = subcategory::where('id', $id)->value('category_id');

        subcategory::findOrFail($id)->delete();
        
        category::where('id', $cat_id)->decrement('subcategory_count',1);

        return redirect()->route('allsubcategory')->with('message', 'Subcategory deleted Successfully!');
    }
}
