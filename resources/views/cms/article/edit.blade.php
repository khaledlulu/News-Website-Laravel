@extends('cms.parant')


@section('titel','Edit The  Article')

@section('style')

@endsection
@section('Maintitel','Edit Article')

@section('subtitel','edit article')

@section('content')
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">Edit The  Article</h3>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form  >
        @csrf
    <div class="card-body">
        <div class="form-group">
        <label for="title"> Edit the Name of Article</label>
        <input type="text" class="form-control" name="title"value="{{ $articles->title }}" id="title" >
        </div>

        <div class="form-group">
        <label for="short_description"> Edit the Short Description of Article</label>
        <input type="text" class="form-control" name="short_description"value="{{ $articles->short_description }}" id="short_description" >
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label for="full_description"> Edit the Full Description of Article </label>
            <textarea class="form-control" name="full_description" id="full_description" cols="50" rows="10" style="resize: none"
            placeholder="Enter the Description">{{ $articles->full_description }}</textarea>
                </div>
            </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <a href="#" onclick="performUpdate({{ $articles->id }})" type="button" class="btn btn-primary">Update</a>
    </div>
    </form>
</div>


@endsection
@section('script')
<script>
    function  performUpdate(id){
        let formData = new FormData();
        formData.append('title' ,document.getElementById('title').value);
        formData.append('short_description' ,document.getElementById('short_description').value);
        formData.append('full_description' ,document.getElementById('full_description').value);
        storeRoute('/news/admin/update_articles/'+ id ,formData)
    }
</script>


@endsection
