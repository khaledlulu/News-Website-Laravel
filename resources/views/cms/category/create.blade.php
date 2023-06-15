@extends('cms.parant')


@section('titel','Create New Category')

@section('style')

@endsection
@section('Maintitel','Create Category')

@section('subtitel','create category')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Craet New Category</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form >
        @csrf

      <div class="card-body">
        <div class="form-group">
        <label for="name">Name of Category</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter The Category Name">
        </div>

        <div class="form-group ">
        <label for="description">Description </label>
        <textarea class="form-control" name="description" id="description" cols="40" rows="10"
        placeholder="Enter the Description"></textarea>
            </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="#" onclick="performstore()" type="button" class="btn btn-primary">Store</a>
        <a href="{{ route('categories.index') }}" type="button"
        class="btn btn-primary">Return to index</a>
      </div>
    </form>
  </div>


@endsection
@section('script')

    <script>
        function  performstore(){
            let formData = new FormData();
            formData.append('name' ,document.getElementById('name').value);
            formData.append('description' ,document.getElementById('description').value);
            store('/news/admin/categories',formData)
        }
    </script>

@endsection
