<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get(); 

        return view('backend.pages.Products.manage' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.Products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
              'title' => 'required|max:255',
            ],
            [
              'title.required' => 'Enter the title',
            ]
          );
      
      
          $product = new Product();
          $product->title = $request->title;
          $product->slug = Str::slug($request->title);
          $product->short_desc = $request->short_desc;
          $product->description = $request->description;
          $product->tag = $request->tag;
          $product->quantity  = $request->quantity;
          $product->regular_price = $request->regular_price;
          $product->offer_price = $request->offer_price;
          $product->sku_code = $request->sku_code;
          $product->product_type = $request->product_type;
          $product->category_id = $request->category;
          $product->brand_id = $request->brand;
          $product->featured = $request->feture;
          $product->status = $request->status;
      
          if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/product/' . $img);
            Image::make($image)->save($location);
            $product->image = $img;
          }
      
          $product->save();
        //   return redirect()->route('Product.manage');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
