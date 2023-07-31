@extends('cms.parant')


@section('titel','Index Country')

@section('styles')

@endsection
@section('Maintitel','Index Country')

@section('subtitel','index country')

@section('content')

<div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Country of Table</h3> --}}
        <a href="{{ route('countries.create') }}" type="button"
        class="btn btn-primary">Add New Country</a>
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>ID</th>
                <th>Country Name</th>
                <th>Country Code</th>
                <th>Num of City</th>
                <th>setting</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)

                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->country_name }}</td>
                    <td>{{ $country->code }}</td>
                    <td span class="badge bg-success">{{ $country->citeies_count }}</td>
                    <td>

                            <div class="btn btn-group">
                            <a href={{ route('countries.edit',$country->id) }} type="button" class="btn btn-primary">edit</a>
                            <form action="{{ route('countries.destroy' ,$country->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
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
    {{ $countries->links() }}
    <!-- /.card -->
    </div>

@endsection
@section('script')

@endsection
