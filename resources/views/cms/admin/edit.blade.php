@extends('cms.parant')


@section('titel','Edit New Admin')

@section('style')

@endsection
@section('Maintitel','Edit Admin')

@section('subtitel','edit admin')

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
        <input type="text" class="form-control" name="first_name" id="first_name"
        value="{{ $admin->user->first_name  }}"    placeholder="Enter The First Name">
        </div>

        <div class="form-group col-md-4">
        <label for="last_name">Last Name </label>
        <input type="text" class="form-control" name="last_name" id="last_name"
        value="{{ $admin->user->last_name  }}"  placeholder="Enter The Last Name">
        </div>
        </div>

        <div class="row card-body">
        <div class="form-group col-md-4">
        <label for="mobil">Mobile </label>
        <input type="text" class="form-control" name="mobil" id="mobil"
        value="{{ $admin->user->mobil}}"  placeholder="Enter The Mobile">
        </div>

        <div class="form-group col-md-4">
        <label for="email">Email </label>
        <input type="text" class="form-control" name="email" id="email"
        value="{{ $admins->email }}" placeholder="Enter The Email">
        </div>

        {{-- <div class="form-group col-md-4">
        <label for="password">Password </label>
        <input type="password" class="form-control" name="password" id="password"
        value="{{ $admins->user->password }}"  placeholder="Enter The Email">
        </div> --}}

        </div>

        <div class="row card-body">
        <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <select class="form-control " style="width: 100%;" id="gender" name="gender"
            aria-label=".form-select-sm example">
                <option selected >{{ $admin->user->gender }}</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control " style="width: 100%;" id="status" name="status"
            aria-label=".form-select-sm example">

            <option selected >{{ $admin->user->status }}</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="form-group col-md-4">
        <label for="birth_date">Birthday </label>
        <input type="date" class="form-control" name="birth_date" id="birth_date"
        value="{{ $admins->user->birth_date }}" placeholder="Enter The Birthday">
        </div>

        </div>


        <div class="form-group col-md-6 card-body">
        <label for="image">Image </label>
        <input type="file" class="form-control" name="image" id="image" placeholder=" chosee the pic">
        </div>


      <!-- /.card-body -->

      <div class="card-footer">
        <a href="#" onclick="performsUpdate({{ $admins->id }})" type="button" class="btn btn-primary">Creat</a>
        <a href="{{ route('admins.index') }}" type="button"
        class="btn btn-primary">Return to index</a>
      </div>
    </form>
  </div>
  </div>


@endsection
@section('script')

    <script>
        function  performsUpdate(id){
            let formData = new FormData();
            formData.append('first_name' ,document.getElementById('first_name').value);
            formData.append('last_name' ,document.getElementById('last_name').value);
            formData.append('mobil' ,document.getElementById('mobil').value);
            formData.append('email' ,document.getElementById('email').value);
        // formData.append('password' ,document.getElementById('password').value);
            formData.append('gender' ,document.getElementById('gender').value);
            formData.append('status' ,document.getElementById('status').value);
            formData.append('birth_date' ,document.getElementById('birth_date').value);
            formData.append('image' ,document.getElementById('image').files[0]);
            formData.append('country_id' ,document.getElementById('country_id').value);
            storeRoute('/news/admin/update_admins/'+ id ,formData)
            // storeRoute('/news/admin/update_cities/'+ id ,formData)

        }
    </script>

@endsection
