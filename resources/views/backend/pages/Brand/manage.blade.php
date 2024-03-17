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
        <h6 class="br-section-label">Manage Brand</h6>
        <!-- <p class="br-section-text">Using the most basic table markup.</p> -->

        <div class="bd bd-gray-300 rounded table-responsive">
            <table class="table table-hover mb-0 ">
                <thead class="thead-colored thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Feature</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 15px">
                    @php $i=1; @endphp
                    @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>
                            @if (!is_null($brand->image))
                            <img style="width:50px; height:50px; border-radius:50%" class="border border-primary " src="{{asset('Backend/img/brand')}}/{{$brand->image}}" >
                            @else
                            No Image Uplode
                            @endif
                        </td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->slug}}</td>
                        <td>{{$brand->description}}</td>
                        <td>
                            @if ($brand->is_feature==1)
                            <span class="badge badge-success">Yes Feature</span>
                            @else
                            <span class="badge badge-warning">Not Feature</span>
                            @endif
                        </td>
                        <td>
                            @if ($brand->Status==1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-warning">Inactive</span>
                            @endif 
                        </td>
                        <td>
                       
                             <a href="{{route('Brand.edit',$brand->id)}}" class="btn btn-success rounded-circle btn-icon" style=" width: 25px;height: 25px;" ><div><i class="fa fa-shar-alt"></i></div></a>
                             <a href="#"data-bs-toggle="modal" data-bs-target="#dleteleModal{{'$brand->id'}}" class="btn btn-danger btn-icon rounded-circle mg-r-5" style=" width: 25px;height: 25px;"><div><i class="fa fa-envelope-o"></i></div></a>
                            </td>
                    </tr>
                    @php $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- bd -->

    </div>
</div>


{{-- modal section --}}

  <!-- Modal -->
  <div class="modal fade" id="dleteleModal{{'$brand->id'}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
       Are you sure Delete this Brand
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a type="submit" href="{{route('Brand.destroy',$brand->id)}}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>

    @endsection