<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all_products(){
        $products = product::latest()->get();
        return view('admin.allproducts', compact('products'));
    }

    public function add_products(){
        $categories = category::latest()->get();
        $subcategories = subcategory::latest()->get();
        return view('admin.addproducts', compact('categories', 'subcategories'));
    }

    public function store_product(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'Quantitiy' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => ['required', 'exists:categories,id'],
            'product_subcategory_id' => ['required', 'exists:subcategories,id'],
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('product_img');
        $imageName = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
        $request->product_img->move(public_path('Upload'), $imageName);
        $img_url = 'upload/'.$imageName;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = category::where('id', $category_id)->value('category_name');
        $subcategory_name = subcategory::where('id', $subcategory_id)->value('subcategory_name');
    
        product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_img' => $img_url,
            'Quantitiy' => $request->Quantitiy,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);

        category::where('id', $category_id)->increment('product_count',1);
        subcategory::where('id', $subcategory_id)->increment('Product_count',1);

        return redirect()->route('allproducts')->with('message', 'Product Added Successfully!');
    
    }

    public function edit_product_image($id){
        $product_info = product::findOrFail($id);
        return view('admin.editproductimage', compact('product_info'));
    }

    public function update_product_image(Request $request){
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $updated_product_id = $request->product_img_id;

        $image = $request->file('product_img');
        $imageName = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
        $request->product_img->move(public_path('Upload'), $imageName);
        $img_url = 'upload/'.$imageName;

        product::findOrFail($updated_product_id)->update([
            'product_img' => $img_url
        ]);

        return redirect()->route('allproducts')->with('message', 'Product image updated Successfully!');
    }

    public function edit_product($id){
        $product_info = product::findOrFail($id);
        return view('admin.editproduct', compact('product_info'));
    }

    public function update_product(Request $request){
        
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'Quantitiy' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $product_id = $request->product_id;

        $image = $request->file('product_img');
        $imageName = hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
        $request->product_img->move(public_path('Upload'), $imageName);
        $img_url = 'upload/'.$imageName;

        product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'Quantitiy' => $request->Quantitiy,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);

        return redirect()->route('allproducts')->with('message', 'Product information updated Successfully!');

    }

    public function delete_product($id){
        $cat_id = product::where('id', $id)->value('product_category_id');
        $sub_cat_id = product::where('id', $id)->value('product_subcategory_id');

        product::findOrFail($id)->delete();

        category::where('id', $cat_id)->decrement('product_count',1);
        subcategory::where('id', $sub_cat_id)->decrement('Product_count',1);

        return redirect()->route('allproducts')->with('message', 'Product deleted Successfully!');
    }
}
