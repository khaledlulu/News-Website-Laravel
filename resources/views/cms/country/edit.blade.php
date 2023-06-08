@extends('cms.parant')


@section('titel','Edit The  Country')

@section('style')

@endsection
@section('Maintitel','Edit Country')

@section('subtitel','edit country')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit The  Country</h3>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('countries.update' , $countries->id)}} " method="POST" >
        @csrf
        @method('PUT')
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Alert!</h5>
          @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
          @endforeach
        </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Successflly</h5>
            {{ session('message') }}
            </div>
        @endif
      <div class="card-body">
        <div class="form-group">
          <label for="country_name">Name of Country</label>
          <input type="text" class="form-control" name="country_name"value="{{ $countries->country_name }}" id="country_name" >
        </div>
        <div class="form-group">
          <label for="code">Code of Country</label>
          <input type="text" class="form-control" name="code" value="{{ $countries->code }}"
          id="code" >
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>


@endsection
@section('script')

@endsection
