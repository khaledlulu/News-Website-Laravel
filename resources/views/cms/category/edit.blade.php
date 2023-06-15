@extends('cms.parant')


@section('titel','Edit The  Category')

@section('style')

@endsection
@section('Maintitel','Edit Category')

@section('subtitel','edit category')

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit The  Category</h3>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form  >
        @csrf
    <div class="card-body">
        <div class="form-group">
        <label for="name"> Edite the Name of Category</label>
        <input type="text" class="form-control" name="name"value="{{ $categories->name }}" id="name" >
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="description"> Edit the Description </label>
            <textarea class="form-control" name="description" id="description" cols="50" rows="10" style="resize: none"
            placeholder="Enter the Description">{{ $categories->description }}</textarea>
                </div>
            </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a href="#" onclick="performUpdate({{ $categories->id }})" type="button" class="btn btn-primary">Update</a>
    </div>
    </form>
</div>


@endsection
@section('script')
<script>
    function  performUpdate(id){
        let formData = new FormData();
        formData.append('name' ,document.getElementById('name').value);
        formData.append('description' ,document.getElementById('description').value);
        storeRoute('/news/admin/update_categories/'+ id ,formData)
    }
</script>


@endsection
