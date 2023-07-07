@extends('cms.parant')


@section('titel','Index Permission')

@section('styles')

@endsection
@section('Maintitel','Index Permission')

@section('subtitel','index Permission')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Permission of Table</h3> --}}
        <a href="{{ route('permissions.create') }}" type="button"
        class="btn btn-primary">Add New Permission</a>

        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Permission Name</th>
                <th>Guard Name</th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $Permission)

                <tr>
                    <td>{{ $Permission->id }}</td>
                    <td>{{ $Permission->name??'not found' }}</td>
                    <td>{{ $Permission->guard_name??'not found' }}</td>
                    <td>

                    <div class="btn ">
        <a href={{ route('permissions.edit', $Permission->id ) }} type="button" class="btn btn-primary">edit</a>
            <a href="#"  onclick="performDestroy({{ $Permission->id }} , this)"
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
    {{ $permissions->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>

    function performDestroy(id,referance) {
        // let url= '/news/admin/cities/'+id;
        confirmDestroy('/news/admin/permissions/'+id,referance)

    }
</script>
@endsection
