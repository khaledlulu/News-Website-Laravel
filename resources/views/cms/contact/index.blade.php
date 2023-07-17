@extends('cms.parant')


@section('titel','Index Contact')

@section('styles')

@endsection
@section('Maintitel','Index Contact')

@section('subtitel','index contact')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Phone </th>
                <th>Email </th>
                <th>Message</th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $Contact)

                <tr>
                    <td>{{ $Contact->id }}</td>
                    <td>{{ $Contact->Full_name }}</td>
                    <td>{{ $Contact->phone }}</td>
                    <td>{{ $Contact->email }}</td>
                    <td>{{ $Contact->message }}</td>
                    <td>

                    <div class="btn ">
            <a href="#"  onclick="performDestroy({{ $Contact->id }} , this)"
                type="button" class="btn btn-danger">Delete</a>
                    </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{ $contacts->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>

    function performDestroy(id,referance) {
        // let url= '/news/admin/cities/'+id;
        confirmDestroy('/news/admin/contacts/'+id,referance)

    }
</script>
@endsection
