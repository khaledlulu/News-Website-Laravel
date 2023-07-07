@extends('cms.parant')


@section('titel','Index Admin')

@section('styles')

@endsection
@section('Maintitel','Index Admin')

@section('subtitel','index admin')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Admin of Table</h3> --}}
        <a href="{{ route('admins.create') }}" type="button"
        class="btn btn-primary">Add New Admin</a>

        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>FitstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Status </th>
                <th>Gender</th>
                <th>BirthDate</th>
                <th>Image</th>
                <th>Setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)

                <tr>
                    <td>{{ $admin->id }}</td>
                    {{-- يجوز الوجهان في كتابة البديل في هدول المثالين --}}
                    <td>{{ $admin->user->first_name ?? 'not found' }}</td>
                    <td>{{ $admin->user ? $admin->user->last_name : 'not found' }}</td>
                    <td>{{ $admin->email}}</td>
                    <td>{{ $admin->user ? $admin->user->mobile : 'not found'  }}</td>
                    <td>{{ $admin->user->status ?? 'not found' }}</td>
                    <td>{{ $admin->user->gender ?? 'not found' }}</td>
                    <td>{{ $admin->user->birth_date ?? 'not found' }}</td>
                    <td>

                        <img class="img-circle img-bordered-sm "
                        src="{{ $admin->user ? asset('storage/images/admin/'.$admin->user->image) : asset('image/Backend_Roadmap _.jpg') }}"
                        width="50" height="50" alt="User Image">
                    </td>
                <td>
            <div class="btn-group-sm card-body">
            <a href={{ route('admins.edit', $admin->id ) }} type="button" class="btn btn-primary">edit</a>
            <a href="#"  onclick="performDestroy({{ $admin->id }}, this)"
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
    {{ $admins->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>




function performDestroy(id,referance) {
        let url= '/news/admin/admins/'+id;
        confirmDestroy(url,referance)

    }
</script>
@endsection
