@extends('backend.layout.template')
@section('body')
<div class="br-pagetitle">
    <!-- <i class="icon ion-ios-gear-outline tx-24" style="font-size:2rem"></i> -->
    <div>
        <!-- <h4 class="">Dashboard</h4>
          <p class="mg-b-0">All Brands Manage</p> -->
    </div>
</div>
<div class="br-pagebody ">
    <div class="br-section-wrapper">
        <div class="col-xl-12">
            <div class="form-layout form-layout-4">
                <h6 class="br-section-label">Add Category</h6>

                <!-- <p class="br-section-text">A basic form where labels are aligned in left.</p> -->
                <form action="{{route('Category.update',$category->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">

                        <label class="col-sm-4 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$category->name}}" name="name" class="form-control" placeholder="Enter firstname">
                        </div>
                    </div><!-- row -->

                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Category Discription: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea rows="2" name="description" class="form-control" placeholder="Enter your address">{{$category->description}}</textarea>
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Is Parent: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="parant" >
                                selected
                                <option value="{{ $category->is_parent }}">
                                    @if ($category->parent)
                                        {{ $category->parent->name }}
                                    @else
                                        No Parent
                                    @endif
                                </option>
                                @foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', 0)->get() as $parentcat)
                                    <option value="{{$parentcat->id}}">{{$parentcat->name}}</option>
                                @foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $parentcat->id)->get() as $childcat)    
                                <option value="{{$childcat->id}}">{{$childcat->name}}</option>
                                @endforeach
                                @endforeach
                            
                        
                            </select>
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Status: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="0" @if($category->status==0)
                                selected @endif>Inactive</option>
                            <option value="1" @if($category->status==1)
                                selected @endif>Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Uplode Image/Logo: <span class="tx-danger">*</span></label>
                        @if (!is_null($category->image))
                        <img style="width:50px; height:50px; padding:0px; border-radius:50%" class="border border-primary" src="{{asset('Backend/img/category')}}/{{$category->image}}" >
                        @else
                        No Image Uplode
                        @endif
                        <div class="col-md-7 mg-t-10 mg-sm-t-0">
                            <input class="form-control fileuplode" name="image" type="file" id="formFile">
                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30">
                        <input type="submit" class="btn btn-info">
                        <button class="btn btn-secondary">Cancel</button>
                    </div>
                </form><!-- form-layout-footer -->
            </div>
        </div>
    </div>
</div><!-- form-layout -->


@endsection