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
                        <th>Name</th>
                        <th>Priority</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 15px">
                    @php $i=1; @endphp
                    @foreach($divisions as $division)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$division->name}}</td>
                        <td>{{$division->priority}}</td>
                        <td>
                       
                             <a href="{{route('Division.edit',$division->id)}}" class="btn btn-success rounded-circle btn-icon" style=" width: 25px;height: 25px;" ><div><i class="fa fa-shar-alt"></i></div></a>
                             <a href="#"data-bs-toggle="modal" data-bs-target="#dleteleModal{{$division->id}}" class="btn btn-danger btn-icon rounded-circle mg-r-5" style=" width: 25px;height: 25px;"><div><i class="fa fa-envelope-o"></i></div></a>
                             {{-- modal section --}}

  <!-- Modal -->
  <div class="modal fade" id="dleteleModal{{$division->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Division</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
       Are you sure Delete this Division
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a type="submit" href="{{route('Division.destroy', $division->id)}}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
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




    @endsection