@extends('cms.parant')


@section('titel','Edite  Roles')

@section('style')

@endsection
@section('Maintitel','Edite Roles')

@section('subtitel','edite Roles')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Craet New Roles</h3>
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
                <option value="admin" @if($roles->guard_name =='admin')selected @endif>Admin</option>
                <option value="author"@if($roles->guard_name =='author')selected @endif>Author</option>
                <option value="web"@if($roles->guard_name =='web')selected @endif>Uesr</option>
            </select>
        </div>


        <div class="form-group col-md-4">
        <label for="name">Name of Roles</label>
        <input type="text" class="form-control" name="name" id="name"
        value="{{ $roles->name }}" placeholder="Enter The Roles Name">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="#" onclick="performUpdate({{ $roles->id }})" type="button" class="btn btn-primary">Update</a>
        {{-- <a href="{{ route('roles.index') }}" type="button"
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
            storeRoute('/news/admin/update_roles/'+id,formData)
        }
    </script>

@endsection
