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
                <h6 class="br-section-label">Update Product</h6>

                <!-- <p class="br-section-text">A basic form where labels are aligned in left.</p> -->
                <form action="{{route('Product.update',$product->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row ">

                        <label class="col-sm-4 form-control-label">Product Title: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$product->title}}" name="title" class="form-control" placeholder="Enter Product title">
                        </div>
                    </div><!-- row mg-t-20 -->

                    <div class="row mg-t-20 mg-t-20">
                        <label class="col-sm-4 form-control-label">Short Discription: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea row mg-t-20s="2" name="short_desc" class="form-control" placeholder="Enter short_desc">{{$product->short_desc}}</textarea>
                        </div>
                    </div>
                    
                    <div class="row mg-t-20 mg-t-20">
                        <label class="col-sm-4 form-control-label"> Discription: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea row mg-t-20s="2" name="description" class="form-control" placeholder="Enter description">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">Quantity: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$product->quantity}}" name="quantity" class="form-control" placeholder="Enter quantity">
                        </div>
                    </div>
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">Regular price: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$product->regular_price}}" name="regular_price" class="form-control" placeholder="Enter regular_price">
                        </div>
                    </div>
                   
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">Offer price: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$product->offer_price}}" name="offer_price" class="form-control" placeholder="Enter offer_price">
                        </div>
                    </div>
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">Tag: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$product->tag}}" name="tag" class="form-control" placeholder="Enter tag">
                        </div>
                    </div>
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">Sku code: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$product->sku_code}}" name="sku_code" class="form-control" placeholder="Enter sku_code">
                        </div>
                    </div>
                    <div class="row mg-t-20 mg-t-20">
                        <label class="col-sm-4 form-control-label">Product type: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="product_type" aria-label=" Select product type">
                                <option selected>Open this select menu</option>
                                <option value="0" @if($product->product_type==0)
                                    selected @endif>New</option>
                                <option value="1" @if($product->product_type==1)
                                    selected @endif>Old</option>
                            </select>
                        </div>
                    </div>


                    <div class="row mg-t-20 mg-t-20">
                        <label class="col-sm-4 form-control-label">Product Brand: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="brand" >
                                <option value="{{ $product->brand_id }}">
                                    @if ($product->brand)
                                        {{ $product->brand->name }}
                                    @else
                                       No Brand
                                    @endif
                                </option>
                                @foreach (App\Models\Backend\Brand::orderBy('name', 'asc')->get() as $brandname)
                                    <option value="{{$brandname->id}}">{{$brandname->name}}</option>
                                @endforeach
                        
                            </select>
                        </div>
                    </div>
                   
                   
                    
                    <div class="row mg-t-20 mg-t-20">
                        <label class="col-sm-4 form-control-label">Product Category: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="category" >
                                <option value="{{ $product->category_id }}">
                                    @if ($product->category)
                                        {{ $product->category->name }}
                                    @else
                                       No Category
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
                        <label class="col-sm-4 form-control-label">Is Feture: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="feture" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="0" @if($product->featured==0)
                                    selected @endif>No feture</option>
                                <option value="1" @if($product->featured==1)
                                    selected @endif>Yes feture</option>
                            </select>
                        </div>
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Status: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="status" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="0" @if($product->status==0)
                                    selected @endif>Inactive</option>
                                <option value="1" @if($product->status==1)
                                    selected @endif>Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Uplode Image/Logo: <span class="tx-danger">*</span></label>
                        @if (!is_null($product->image))
                        <img style="width:50px; height:50px; padding:0px; border-radius:50%" class="border border-primary" src="{{asset('Backend/img/product')}}/{{$product->image}}" >
                        @else
                        No Image Uplode
                        @endif
                        <div class="col-md-7 mg-t-10 mg-sm-t-0">
                            <input class="form-control fileuplode" name="image" type="file" id="formFile">
                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30">
                        <input type="submit" class="btn btn-info">
                        <a href="{{route("Product.manage")}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form><!-- form-layout-footer -->
            </div>
        </div>
    </div>
</div><!-- form-layout -->


@endsection