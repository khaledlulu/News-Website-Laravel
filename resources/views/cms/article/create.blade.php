@extends('cms.parant')


@section('titel','Create New Article')

@section('style')

@endsection
@section('Maintitel','Create Article')

@section('subtitel','create article')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Craet New Article</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form >
        @csrf

    <div class="card-body">
        <div class="form-group col-md-12">
            <label for="author_id"> Name the Author</label>
            <select class="form-control " style="width: 100%;" id="author_id" name="author_id"
            aria-label=".form-select-sm example">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}">
                {{  $author->user ? $author->user->first_name.' '.$author->user->last_name : ' ' }}
            </option>
                @endforeach
            </select>
        </div>
        {{-- <input type="text" name="author_id" id="author_id"
                    class="form-control form-control-solid" hidden/> --}}

        <div class="form-group col-md-12">
            <label for="category_id">Category Name</label>
            <select class="form-control " style="width: 100%;" id="category_id" name="category_id"
            aria-label=".form-select-sm example">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
        <label for="title">Title of Article</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter The Article Title">
        </div>

        <div class="form-group">
        <label for="short_description">Short Description of Article</label>
        <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter the Short Description">
        </div>

        <div class="form-group ">
        <label for="full_description"> Full Description of Article </label>
        <textarea class="form-control" name="full_description" id="full_description" cols="40" rows="10"
        placeholder="Enter the Full Description"></textarea>
            </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="#" onclick="performstore()" type="button" class="btn btn-primary">Store</a>
        <a href="{{ route('articles.index') }}" type="button"
        class="btn btn-primary">Return to index</a>
      </div>
    </form>
  </div>


@endsection
@section('script')

    <script>
        function  performstore(){
            let formData = new FormData();
            formData.append('title' ,document.getElementById('title').value);
            formData.append('short_description' ,document.getElementById('short_description').value);
            formData.append('full_description' ,document.getElementById('full_description').value);
            formData.append('category_id' ,document.getElementById('category_id').value);
            formData.append('author_id' ,document.getElementById('author_id').value);
            store('/news/admin/articles',formData)
        }
    </script>

@endsection
