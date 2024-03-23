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
                <h6 class="br-section-label">Update Division</h6>

                <!-- <p class="br-section-text">A basic form where labels are aligned in left.</p> -->
                <form action="{{route('Division.update',$division->id)}}" method="POST" >
                    @csrf
                  
                    <div class="row">

                        <label class="col-sm-4 form-control-label">Division Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="name" class="form-control" 
                            value="{{$division->name}}" placeholder="Enter firstname">
                        </div>
                    </div>
                    <div class="row mg-t-20 mg-t-20">

                        <label class="col-sm-4 form-control-label">Division Priority: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input value="{{$division->priority}}" type="text" name="priority" class="form-control" placeholder="Enter Division priority ">
                        </div>
                    </div><!-- row -->

                    
                    
                   
                    
                    <div class="form-layout-footer mg-t-30">
                        <input type="submit" class="btn btn-info">
                        <a href="{{route('Division.manage')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                  
                </form><!-- form-layout-footer -->
            </div>
        </div>
    </div>
</div><!-- form-layout -->


@endsection