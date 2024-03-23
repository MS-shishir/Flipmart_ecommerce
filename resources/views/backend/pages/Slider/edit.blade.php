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
                <h6 class="br-section-label">Add Slider</h6>

                <!-- <p class="br-section-text">A basic form where labels are aligned in left.</p> -->
                <form action="{{route('Slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">

                        <label class="col-sm-4 form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input value="{{$slider->title}}" type="text" name="title" class="form-control" placeholder="Enter titlr">
                        </div>
                    </div>
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">SubTitle: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$slider->subtitle}}" name="subtitle" class="form-control" placeholder="Enter subtitle">
                        </div>
                    </div><!-- row -->

                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Slider Discription: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea rows="2" name="discription" class="form-control" placeholder="Enter discription">{{$slider->discription}}</textarea>
                        </div>
                    </div>
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">Button Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$slider->btn_name}}" name="btn_name" class="form-control" placeholder="Enter button name">
                        </div>
                    </div>
                    <div class="row mg-t-20">

                        <label class="col-sm-4 form-control-label">Button URL: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" value="{{$slider->btn_url}}" name="btn_url" class="form-control" placeholder="Submit URL">
                        </div>
                    </div>
                    
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Uplode Image/Logo: <span class="tx-danger">*</span></label>
                        @if (!is_null($slider->image))
                        <img style="width:50px; height:50px; padding:0px; border-radius:50%" class="border border-primary" src="{{asset('backend/img/slider')}}/{{$slider->image}}" >
                        @else
                        No Image Uplode
                        @endif
                        <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                            <input class="form-control fileuplode" name="image" type="file" id="formFile">
                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30">
                        <input type="submit" class="btn btn-info">
                        <a href="{{route('Slider.manage')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form><!-- form-layout-footer -->
            </div>
        </div>
    </div>
</div><!-- form-layout -->


@endsection