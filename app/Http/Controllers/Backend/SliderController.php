<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::orderBy('id', 'asc')->get();
        return view('backend.pages.Slider.manage', compact('sliders')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('backend.pages.Slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $slider= new Slider();
      $slider->title = $request->title;
      $slider->subtitle = $request->subtitle;
      $slider->discription = $request->discription;
      $slider->btn_name = $request->btn_name;
      $slider->btn_url = $request->btn_url;
      
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $img = rand() . '.' . $image->getClientOriginalExtension();
        $location = public_path('backend/img/slider/' . $img);
        Image::make($image)->save($location);
        $slider->image = $img;
    }
      
      $slider->save();
      return redirect()->route('Slider.manage');
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
        $slider=SLider::find($id);
      if(!is_null($slider)){
        return view('backend.pages.Slider.edit',compact('slider'));
      }
      else{
        return redirect()->route('Slider.manage');
      }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $slider= Slider::find($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->discription = $request->discription;
        $slider->btn_name = $request->btn_name;
        $slider->btn_url = $request->btn_url;
        if(!is_null($request->image)){
            if(File::exists('backend/img/slider',$slider->image)){
               File::delete('backend/img/slider',$slider->image);
            }
    
           
              $image = $request->file('image');
              $img = rand() . '.' . $image->getClientOriginalExtension();
              $location = public_path('backend/img/slider/' . $img);
              Image::make($image)->save($location);
              $slider->image = $img;
          
          }
            $slider->save();
            return redirect()->route('Slider.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider= Slider::find($id);
        if(!is_null($slider)){
          if(File::exists('backend/img/slider',$slider->image)){
             File::delete('backend/img/slider',$slider->image);
          }
          $slider->delete();
          return redirect()->route('Slider.manage');
  }
  else{
    return redirect()->route('Slider.manage');
  }
    }
}
