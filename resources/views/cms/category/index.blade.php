@extends('cms.parant')


@section('titel','Index Categories')

@section('styles')

@endsection
@section('Maintitel','Index Categories')

@section('subtitel','index categories')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Categories of Table</h3> --}}
        <a href="{{ route('categories.create') }}" type="button"
        class="btn btn-primary">Add New Categories</a>

        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Categories Name</th>
                <th> Description Categories </th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>

                    <div class="btn ">
            <a href={{ route('categories.edit', $category->id ) }} type="button" class="btn btn-primary">edit</a>
            <a href="#"  onclick="performDestroy({{ $category->id }} , this)"
                type="button" class="btn btn-danger">Delete</a>

                {{-- <button type="button" class="btn btn-success">info</button> --}}
                    </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $categories->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>

    function performDestroy(id,referance) {
        // let url= '/news/admin/cities/'+id;
        confirmDestroy('/news/admin/categories/'+id,referance)

    }
</script>
@endsection
