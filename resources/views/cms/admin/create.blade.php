@extends('cms.parant')


@section('titel','Create New Admin')

@section('style')

@endsection
@section('Maintitel','Create Admin')

@section('subtitel','create admin')

@section('content')
<div class=" card-body">
<div class="card card-primary ">
    <div class="card-header">
      <h3 class="card-title">Craet New Admin</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form >
        @csrf
        <div class="row card-body">
        <div class="form-group col-md-4">
            <label for="country_id">country name</label>
            <select class="form-control " style="width: 100%;" id="country_id"
             aria-label=".form-select-sm example" aria-placeholder="chosse the country">
                @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>
          </div>


        <div class="form-group col-md-4">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter The First Name">
        </div>

        <div class="form-group col-md-4">
        <label for="last_name">Last Name </label>
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter The Last Name">
        </div>
        </div>

        <div class="row card-body">
            <div class="form-group col-md-4">
                <label for="mobil">Mobil </label>
                <input type="text" class="form-control" name="mobil" id="mobil" placeholder="Enter The Mobil">
                </div>

        <div class="form-group col-md-4">
        <label for="email">Email </label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter The Email">
        </div>

        <div class="form-group col-md-4">
        <label for="password">Password </label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter The Password">
        </div>

        </div>

        <div class="row card-body">
        <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <select class="form-control " style="width: 100%;" id="gender" name="gender"
            aria-label=".form-select-sm example">
                <option value="">All</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control " style="width: 100%;" id="status" name="status"
            aria-label=".form-select-sm example">

                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="form-group col-md-4">
        <label for="birth_date">Birthday </label>
        <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Enter The Birthday">
        </div>

        </div>


        <div class="form-group col-md-4">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image"
            placeholder="Enter Image">
        </div>


      <!-- /.card-body -->

      <div class="card-footer">
        <a href="#" onclick="performstore()" type="button" class="btn btn-primary">Creat</a>
        <a href="{{ route('admins.index') }}" type="button"
        class="btn btn-primary">Return to index</a>
      </div>
    </form>
  </div>
  </div>


@endsection
@section('script')

    <script>
        function  performstore(){
            // let formData = new FormData();
            let formData = new FormData(document.querySelector('form'));
            formData.append('first_name' ,document.getElementById('first_name').value);
            formData.append('last_name' ,document.getElementById('last_name').value);
            formData.append('mobil', document.getElementById('mobil').value);
            formData.append('email' ,document.getElementById('email').value);
            formData.append('password' ,document.getElementById('password').value);
            formData.append('gender' ,document.getElementById('gender').value);
            formData.append('status' ,document.getElementById('status').value);
            formData.append('birth_date' ,document.getElementById('birth_date').value);
            formData.append('country_id' ,document.getElementById('country_id').value);
            formData.append('image' ,document.getElementById('image').files[0]);
            store('/news/admin/admins', formData)

        }
    </script>

@endsection
