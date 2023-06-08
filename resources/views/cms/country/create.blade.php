@extends('cms.parant')


@section('titel','Create New Country')

@section('style')

@endsection
@section('Maintitel','Create Country')

@section('subtitel','create country')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Craet New Country</h3>
    </div>
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
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="country_name">Name of Country</label>
          <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Enter The Name Country">
        </div>
        <div class="form-group">
          <label for="code">Code of Country</label>
          <input type="text" class="form-control" name="code" id="code" placeholder="Enter The code Country">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
  </div>


@endsection
@section('script')

@endsection
