@extends('cms.parant')


@section('titel','Edite  Permission')

@section('style')

@endsection
@section('Maintitel','Edite Permission')

@section('subtitel','edite Permission')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Craet New Permission</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form >
        @csrf
        <div class="card-body">
        <div class="form-group col-md-4">
            <label for="guard_name">Guard Name</label>
            <select class="form-control" style="width: 100%;" id="guard_name" name="guard_name"
                aria-label=".form-select-sm example">
                <option value="">All</option>
                <option value="admin" @if($permissions->guard_name =='admin')selected @endif>Admin</option>
                <option value="author"@if($permissions->guard_name =='author')selected @endif>Author</option>
                <option value="web"@if($permissions->guard_name =='web')selected @endif>Uesr</option>
            </select>
        </div>


        <div class="form-group col-md-4">
        <label for="name">Name of Permission</label>
        <input type="text" class="form-control" name="name" id="name"
        value="{{ $permissions->name }}" placeholder="Enter The Permission Name">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="#" onclick="performUpdate({{ $permissions->id }})" type="button" class="btn btn-primary">Update</a>
        {{-- <a href="{{ route('permissions.index') }}" type="button"
        class="btn btn-primary">Return to index</a> --}}
      </div>
    </form>
  </div>


@endsection
@section('script')

    <script>
        function  performUpdate(id){
            let formData = new FormData();
            formData.append('name' ,document.getElementById('name').value);
            formData.append('guard_name' ,document.getElementById('guard_name').value);
            storeRoute('/news/admin/update_permissions/'+id,formData)
        }
    </script>

@endsection
