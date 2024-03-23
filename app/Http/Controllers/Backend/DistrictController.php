<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $districts = District::orderBy('name', 'asc')->get();
    return view('backend.pages.District.manage', compact('districts'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $divisions = Division::orderBy('priority', 'asc')->get();
    return view('backend.pages.District.creat', compact('divisions'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $district = new District();
    $district->name = $request->name;
    $district->division_id = $request->division_id;

    $district->save();
    return redirect()->route('District.manage');
    
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
    $district = District::find($id);
    $divisions = Division::orderBy('priority', 'asc')->get();
    if (!is_null($district)) {
      return view('backend.pages.District.edit', compact('district', 'divisions'));
    } else {
      return redirect()->route('District.manage');
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $district = District::find($id);
    $district->name = $request->name;
    $district->division_id = $request->division_id;
    $district->save();
    return redirect()->route('District.manage');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $district = District::find($id);
    if (!is_null($district)) {
      $district->delete();
    }
    return redirect()->route('District.manage');
  }
}
