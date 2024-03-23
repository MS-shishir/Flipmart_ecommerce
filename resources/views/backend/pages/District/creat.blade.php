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
                <h6 class="br-section-label">Add District</h6>

                <!-- <p class="br-section-text">A basic form where labels are aligned in left.</p> -->
                <form action="{{route('District.store')}}" method="POST">
                    @csrf
                    <div class="row">

                        <label class="col-sm-4 form-control-label">District Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="name" class="form-control" placeholder="Enter Division name">
                        </div>
                    </div>
                    <div class="row mg-t-20 mg-t-20">

                        <label class="col-sm-4 form-control-label">District Division name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="division_id" id="">
                                <option value="0">select Divition</option>
                                @foreach ($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                            @endforeach
                            </select>
                           
                        </div>
                    </div><!-- row -->
                    
                    <div class="form-layout-footer mg-t-30">
                        <input type="submit" class="btn btn-info">
                        <a href="{{route('District.manage')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form><!-- form-layout-footer -->
            </div>
        </div>
    </div>
</div><!-- form-layout -->


@endsection