<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;




class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $brands=Brand::orderBy('name', 'asc')->get();
        return view('backend.pages.Brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.Brand.creat');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    
    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required|max:255',
      ],
      [
        'name.required'=>'Enter the name',
      ]);


      $brand = new Brand();
      $brand->name = $request->name;
      $brand->slug = Str::slug($request->name);
      $brand->description = $request->description;
      $brand->is_feature = $request->feture;
      $brand->Status = $request->status;
      
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $img = rand() . '.' . $image->getClientOriginalExtension();
        $location = public_path('backend/img/brand/' . $img);
        Image::make($image)->save($location);
        $brand->image = $img;
    }
      
      $brand->save();
      return redirect()->route('Brand.manage');

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
      $brand=Brand::find($id);
      if(!is_null($brand)){
        return view('backend.pages.Brand.edit',compact('brand'));
      }
      else{
        return redirect()->route('Brand.manage');
      }
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     
    

        $request->validate([
          'name'=>'required|max:255',
        ],
        [
          'name.required'=>'Enter the name',
        ]);
        $brand= Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->is_feature = $request->feture;
        $brand->Status = $request->status;
        
       if(!is_null($request->image)){
        if(File::exists('backend/img/brand',$brand->image)){
           File::delete('backend/img/brand',$brand->image);
        }

       
          $image = $request->file('image');
          $img = rand() . '.' . $image->getClientOriginalExtension();
          $location = public_path('backend/img/brand/' . $img);
          Image::make($image)->save($location);
          $brand->image = $img;
      
      }
        $brand->save();
        return redirect()->route('Brand.manage');
  
  
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $brand= Brand::find($id);
      if(!is_null($brand)){
        if(File::exists('backend/img/brand',$brand->image)){
           File::delete('backend/img/brand',$brand->image);
        }
        $brand->delete();
        return redirect()->route('Brand.manage');
}
else{
  return redirect()->route('Brand.manage');
}
    }
  }