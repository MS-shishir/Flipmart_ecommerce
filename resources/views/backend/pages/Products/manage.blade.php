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
                        <th>Title</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Regular Price</th>
                        <th>Offer Price</th>
                        <th>Featured</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 15px">
                    @php $i=1; @endphp
                    @foreach($products as $product)
                    
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>
                            @if (!is_null($product->image))
                            <img style="width:50px; height:50px; border-radius:50%" class="border border-primary " src="{{asset('Backend/img/product')}}/{{$product->image}}" >
                            @else
                            No Image Uplode
                            @endif
                        </td>
                        <td>{{$product->title}}</td>
                        <td>
                        @if(!is_null($product->brand))
                          {{$product->brand->name}}
                        
                        @else
                        <i class="icon ion-minus-circled text-danger fs-5  "></i>
                        @endif
                        </td>
                        <td> @if(!is_null($product->category))
                          {{$product->category->name}}
                        
                        @else
                        <i class="icon ion-minus-circled text-danger fs-5 "></i>
                        @endif</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->regular_price}}</td>
                        <td>{{$product->offer_price}}</td>
                        <td>
                            @if ($product->featured==1)
                            <span class="badge badge-success">Yes Feature</span>
                            @else
                            <span class="badge badge-warning">Not Feature</span>{{$category->parent->name}}</span>
                            @endif
                        </td>
                        <td>
                            @if ($product->status==1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-warning">Inactive</span>
                            @endif 
                        </td>
                        <td style="width: 6rem">
                       
                             <a href="{{route('Product.edit',$product->id)}}" class="btn btn-success rounded-circle btn-icon" style=" width: 25px;height: 25px;" ><div><i class="fa fa-shar-alt"></i></div></a>
                             <a href="#"data-bs-toggle="modal" data-bs-target="#dleteleModal{{'$product->id'}}" class="btn btn-danger btn-icon rounded-circle mg-r-5" style=" width: 25px;height: 25px;"><div><i class="fa fa-envelope-o"></i></div></a>
                             {{-- modal section --}}

  <!-- Modal -->
  <div class="modal fade" id="dleteleModal{{'$product->id'}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
       Are you sure Delete this Product
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a type="submit" href="{{route('Product.destroy',$product->id)}}" class="btn btn-danger">Delete</a>
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