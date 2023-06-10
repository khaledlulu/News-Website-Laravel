@extends('cms.parant')


@section('titel','Create New City')

@section('style')

@endsection
@section('Maintitel','Create City')

@section('subtitel','create city')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Craet New City</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form >
        @csrf
        <div class="form-group col-md-12">
            <label for="country_id">country name</label>
            <select class="form-control " style="width: 100%;" id="country_id"
             aria-label=".form-select-sm example">
                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
          </div>

      <div class="card-body">
        <div class="form-group">
        <label for="city_name">Name of City</label>
        <input type="text" class="form-control" name="city_name" id="city_name" placeholder="Enter The City Name">
        </div>
        <div class="form-group">
        <label for="street">Street </label>
        <input type="text" class="form-control" name="street" id="street" placeholder="Enter The Street Name">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="#" onclick="performstore()" type="button" class="btn btn-primary">Store</a>
        {{-- <a href="{{ route('cities.index') }}" type="button"
        class="btn btn-primary">Return to index</a> --}}
      </div>
    </form>
  </div>


@endsection
@section('script')

    <script>
        function  performstore(){
            let formData = new FormData();
            formData.append('city_name' ,document.getElementById('city_name').value);
            formData.append('street' ,document.getElementById('street').value);
            formData.append('country_id' ,document.getElementById('country_id').value);
            store('/news/admin/cities',formData)
        }
    </script>

@endsection
