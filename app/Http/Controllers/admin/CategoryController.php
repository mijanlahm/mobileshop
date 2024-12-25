<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function all_category(){
        $categories = category::latest()->get();
        return view('admin.allcategory', compact('categories'));
    }

    public function add_category(){
        return view('admin.addcategory');
    }

    public function store_category(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

       
        category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '-', $request->category_name))
        ]);
        
        /*=====other ways====

        $category = new category;
        $category->category_name = $request->category_name; 

        $slug = strtolower(str_replace(' ', '-', $request->category_name));
        $category->slug = $slug;
        $category->save();

        =======================*/

        return redirect()->route('allcategory')->with('message', 'Category Added Successfully!');
    }

    public function edit_category($id){
        $category_info = category::findOrFail($id);
        return view('admin.editcategory', compact('category_info'));
    }

    public function update_category(Request $request){
        $category_id = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);
        
        category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'slug' => strtolower(str_replace(' ', '-', $request->category_name))
           
        ]);

        /*===== other way ========
        $category = category::findOrFail($category_id);
        $category->category_name = $request->category_name;

        $slug = strtolower(str_replace(' ', '-', $request->category_name));
        $category->Slug = $slug;
        
        $category->save();
        ==========================*/

        return redirect()->route('allcategory')->with('message', 'Category updated Successfully!');
    }

    public function delete_category($id){
        
        category::findOrFail($id)->delete();

        /*======= other way ========
        $category = category::findOrFail($id);
        $category->delete();
        ============================*/
        
        return redirect()->route('allcategory')->with('message', 'Category deleted Successfully!');
    }


}
