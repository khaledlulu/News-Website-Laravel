@extends('cms.parant')


@section('titel','Edit Profile ')

@section('style')

@endsection
@section('Maintitel','Edit Profile')

@section('subtitel','edit Profile')

@section('content')
<div class=" card-body">
<div class="card card-primary ">
    <div class="card-header">
        <h3 class="card-title">Edit  Admin</h3>
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
        value="{{ $admins->user->first_name  }}"    placeholder="Enter The First Name">
        </div>

        <div class="form-group col-md-4">
        <label for="last_name">Last Name </label>
        <input type="text" class="form-control" name="last_name" id="last_name"
        value="{{ $admins->user->last_name  }}"  placeholder="Enter The Last Name">
        </div>
        </div>


        <div class="row card-body">
        <div class="form-group col-md-4">
        <label for="mobile">Mobile </label>
        <input type="text" class="form-control" name="mobile" id="mobile"
        value="{{ $admins->user->mobile }}" placeholder="Enter The Mobile">
        </div>
        <div class="form-group col-md-4">
        <label for="email">Email </label>
        <input type="text" class="form-control" name="email" id="email"
        value="{{ $admins->email }}" placeholder="Enter The Email">
        </div>

        <div class="form-group col-md-4">
            <label for="gender">Gender</label>
            <select class="form-control " style="width: 100%;" id="gender" name="gender"
            aria-label=".form-select-sm example">
                <option selected >{{ $admins->user->gender }}</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        </div>

        <div class="row card-body">
        <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control " style="width: 100%;" id="status" name="status"
            aria-label=".form-select-sm example">

            <option selected >{{ $admins->user->status }}</option>
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
    <input type="file" class="form-control" name="image" id="image"
    value="{{   $admins->user->image }}" placeholder=" chosee the pic">
        </div>


        <!-- /.card-body -->

        <div class="card-footer">
        <a href="#" onclick="performsUpdate({{ $admins->id }})" type="button" class="btn btn-primary">Update</a>
        <a href="{{ route('admins.index') }}" type="button"
        class="btn btn-primary">Return to index</a>
        </div>
    </form>
    </div>
    </div>
    </div>

@endsection
@section('script')

    <script>
        function  performsUpdate(id){
            let formData = new FormData();
            formData.append('first_name' ,document.getElementById('first_name').value);
            formData.append('last_name' ,document.getElementById('last_name').value);
            formData.append('mobile' ,document.getElementById('mobile').value);
            formData.append('email' ,document.getElementById('email').value);
        // formData.append('password' ,document.getElementById('password').value);
            formData.append('gender' ,document.getElementById('gender').value);
            formData.append('status' ,document.getElementById('status').value);
            formData.append('birth_date' ,document.getElementById('birth_date').value);
            formData.append('image' ,document.getElementById('image').files[0]);
            formData.append('country_id' ,document.getElementById('country_id').value);
            storeRoute('/news/admin/update/profile' ,formData)

        }
    </script>

@endsection
