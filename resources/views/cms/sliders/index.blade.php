@extends('cms.parant')


@section('titel','Create  Slider')

@section('style')

@endsection
@section('Maintitel','Create Slider')

@section('subtitel','create slider')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <form action="" method="get" style="margin-bottom:2%;">
                    <div class="row">
                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="Search By Title" name='title' @if( request()->title) value={{request()->title}} @endif/>
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                        </div>
                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder=" General Search" name='short_description' @if( request()->search) value={{request()->search}} @endif/>
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                        </div>

                        <div class="input-icon col-md-2">
                            <input type="date" class="form-control" placeholder="Search By Date" name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                        </div>

                        <div class="col-md-6">
                            <button class="btn btn-danger btn-md" type="submit">Filter</button>
                            <a href="{{ route('sliders.create') }}" type="button" class="btn btn-primary">Add new Slider</a>
                            {{-- <a href="{{ route('authors.index') }}" type="button" class="btn btn-info">Author</a> --}}
                        </div>

                    </div>
                </form>
                {{-- <h3 class="card-title"></h3>
          <a href="{{ route('categories.index') }}" type="button" class="btn btn-primary">Category</a>
                <a href="{{ route('authors.index') }}" type="button" class="btn btn-info">Author</a>
                <a href="{{ route('createslider' , $id) }}" class="btn btn-success" style="color: white;"> Add new slider </a>
                <br>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                    <thead>
                        <tr class="bg-info">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image Slider</th>
                            <th>Vidio Slider</th>
                            <th>Short Description</th>
                            <th>Created At</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <td><span class="tag tag-success">Approved</span></td> --}}
                        @foreach ($sliders as $slider )
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->title }}</td>
                            {{-- <td>{{ $slider->image }}</td> --}}
                            <td> <img class="img-circle img-bordered-sm" src="{{asset('/storage/images/slider/'.$slider->image)}}" width="50" height="50" alt="User Image"></td>

                            <td>{{ $slider->video }}</td>
                            <td>{{ $slider->short_description }}</td>
                            {{-- <td> <span class="badge bg-success">{{ $slider->author->user->firstname .' '. $slider->author->user->lastname }}</span></td> --}}
                            <td>{{ $slider->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" onclick="performDestroy({{ $slider->id }}, this)" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br>
        {{ $sliders->links() }}
        <!-- /.card-body -->
    </div>
</div>

<!-- /.card -->
</div>
</div>
@endsection

@section('script')

<script>
    function performDestroy(id, ref) {
        confirmDestroy('/news/admin/sliders/' + id, ref)
    }


</script>

@endsection
