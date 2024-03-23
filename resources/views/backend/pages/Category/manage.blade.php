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
            <h6 class="br-section-label">Manage Category</h6>
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
                            <th>Is Prante</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 15px">
                      @php $i=1; @endphp
                        @foreach ($categorys as $category)
                            @if ($category->is_parent == 0)
                               
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>
                                        @if (!is_null($category->image))
                                            <img style="width:50px; height:50px; border-radius:50%"
                                                class="border border-primary "
                                                src="{{ asset('Backend/img/category') }}/{{ $category->image }}">
                                        @else
                                            No Image Uplode
                                        @endif
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        @if ($category->is_parent == 0)
                                            <span class="badge badge-success">Primary Category </span>
                                        @else
                                            <span class="badge badge-warning">{{ $category->parent->name }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        <a href="{{ route('Category.edit', $category->id) }}"
                                            class="btn btn-success rounded-circle btn-icon"
                                            style=" width: 25px;height: 25px;">
                                            <div><i class="fa fa-shar-alt"></i></div>
                                        </a>
                                        <a href="#"data-bs-toggle="modal"
                                            data-bs-target="#dleteleModal{{ '$category->id' }}"
                                            class="btn btn-danger btn-icon rounded-circle mg-r-5"
                                            style=" width: 25px;height: 25px;">
                                            <div><i class="fa fa-envelope-o"></i></div>
                                        </a>
                                    </td>
                                </tr>

                                {{-- primary category modal section --}}

                                <!-- Modal -->
                                <div class="modal fade" id="dleteleModal{{ '$category->id' }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure Delete this Category
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a type="submit" href="{{ route('Category.destroy', $category->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- SubCategory --}}
                                @foreach (App\Models\Backend\Category::orderBy('name', 'asc')->where('is_parent', $category->id)->get() as $subcat)
                                    @php $j=$i+1 @endphp
                                    <tr>
                                        <!-- Display subcategory details -->
                                        <td>
                                            {{ $j }}
                                        </td>
                                        <td>
                                            @if (!is_null($subcat->image))
                                                <img style="width:50px; height:50px; border-radius:50%"
                                                    class="border border-primary "
                                                    src="{{ asset('Backend/img/category') }}/{{ $subcat->image }}">
                                            @else
                                                No Image Uplode
                                            @endif
                                        </td>
                                        <td>{{ $subcat->name }}</td>
                                        <td>{{ $subcat->slug }}</td>
                                        <td>{{ $subcat->description }}</td>
                                        <td>
                                            @if ($subcat->is_parent == 0)
                                                <span class="badge badge-success">Primary Category </span>
                                            @else
                                                <span class="badge badge-warning">{{ $subcat->parent->name }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($subcat->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-warning">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="{{ route('Category.edit', $subcat->id) }}"
                                                class="btn btn-success rounded-circle btn-icon"
                                                style="width: 25px; height: 25px;">
                                                <div><i class="fa fa-shar-alt"></i></div>
                                            </a>
                                            <!-- Delete button -->
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $subcat->id }}"
                                                class="btn btn-danger btn-icon rounded-circle mg-r-5"
                                                style="width: 25px; height: 25px;">
                                                <div><i class="fa fa-envelope-o"></i></div>
                                            </a>
                                        </td>
                                    </tr>

                                    {{-- SubCategory Modal --}}

                                    <!-- Modal for deleting subcategory -->
                                    <div class="modal fade" id="deleteModal{{ $subcat->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this category?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('Category.destroy', $subcat->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php $j++ @endphp
                                @endforeach

                                @php$i++;
                                @endphp
                            @endif
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- bd -->

        </div>
    </div>
@endsection
