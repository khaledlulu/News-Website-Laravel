@extends('cms.parant')


@section('titel','Edit The  City')

@section('style')

@endsection
@section('Maintitel','Edit City')

@section('subtitel','edit city')

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit The  City</h3>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form  >
        @csrf
        <div class="form-group col-md-4">
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
        <input type="text" class="form-control" name="city_name"value="{{ $cities->city_name }}" id="city_name" >
        </div>
        <div class="form-group">
        <label for="street">Street</label>
        <input type="text" class="form-control" name="street" value="{{ $cities->street }}"
        id="street" >
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a href="#" onclick="performUpdate({{ $cities->id }})" type="button" class="btn btn-primary">Update</a>
    </div>
    </form>
</div>


@endsection
@section('script')
<script>
    function  performUpdate(id){
        let formData = new FormData();
        formData.append('city_name' ,document.getElementById('city_name').value);
        formData.append('street' ,document.getElementById('street').value);
        formData.append('country_id' ,document.getElementById('country_id').value);
        storeRoute('/news/admin/update_cities/'+ id ,formData)
    }
</script>


@endsection
