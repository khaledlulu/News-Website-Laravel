@extends('cms.parant')


@section('titel','Index Roles')

@section('styles')

@endsection
@section('Maintitel','Index Roles')

@section('subtitel','index Roles')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Roles of Table</h3> --}}
        <a href="{{ route('roles.create') }}" type="button"
        class="btn btn-primary">Add New Roles</a>

        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Role Name</th>
                <th>Guard Name</th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)

                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name??'not found' }}</td>
                    <td>{{ $role->guard_name??'not found' }}</td>
                    <td>

                    <div class="btn ">
        <a href={{ route('roles.edit', $role->id ) }} type="button" class="btn btn-primary">edit</a>
            <a href="#"  onclick="performDestroy({{ $role->id }} , this)"
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
    {{ $roles->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>

    function performDestroy(id,referance) {
        // let url= '/news/admin/cities/'+id;
        confirmDestroy('/news/admin/roles/'+id,referance)

    }
</script>
@endsection
