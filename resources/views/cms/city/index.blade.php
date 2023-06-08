@extends('cms.parant')


@section('titel','Index City')

@section('styles')

@endsection
@section('Maintitel','Index City')

@section('subtitel','index city')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">City of Table</h3> --}}
        <a href="{{ route('cities.create') }}" type="button"
        class="btn btn-primary">Add New City</a>

        <div class="card-tools">

        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table  text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Country Name</th>
                <th>City Name</th>
                <th>City Code</th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)

                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->country->country_name??'not found' }}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->street }}</td>
                    <td>

                    <div class="btn ">
            <a href={{ route('cities.edit', $city->id ) }} type="button" class="btn btn-primary">edit</a>
            <a href="#"  onclick="performDestroy({{ $city->id }} , this)"
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
    {{ $cities->links() }}
    <!-- /.card -->
</div>

@endsection
@section('script')
<script>

    function performDestroy(id,referance) {
        // let url= '/news/admin/cities/'+id;
        confirmDestroy('/news/admin/cities/'+id,referance)

    }
</script>
@endsection
