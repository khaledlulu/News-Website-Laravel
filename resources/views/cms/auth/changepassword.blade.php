@extends('cms.parant')


@section('titel','Change Password')

@section('style')

@endsection
@section('Maintitel','Change Password')

@section('subtitel','change password')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Change Password</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form >
        @csrf

        <div class="card-body">
        <div class="form-group col-lg-6">
            {{-- first feild --}}
                <label for="password">Current Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Current Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="toggle-password fas fa-eye"  data-target="password"></span>
                            </div>
                                </div>
                </div>
                {{-- sconed feild --}}
                <label for="new_password">Current Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter Current Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="toggle-password fas fa-eye"  data-target="new_password"></span>
                            </div>
                                </div>
                </div>
                {{-- thired feild --}}
                <label for="new_password_confirmation">Current Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Enter Current Password">
                    <div class="input-group-append" >
                        <div class="input-group-text"  >
                <span  class="toggle-password fas fa-eye"   data-target="new_password_confirmation"></span>
                            </div>
                                </div>
                </div>


        </div>


        <!-- /.card-body -->

        <div class="card-footer form-group col-lg-3" style="background: #fff">
        <a href="#" onclick="performstore()" type="button"  class="btn btn-primary">Store</a>

        </div>
    </form>
    </div>


@endsection
@section('script')

    <script>
        function  performstore(){
            let formData = new FormData();
            formData.append('password' ,document.getElementById('password').value);
            formData.append('new_password' ,document.getElementById('new_password').value);
            formData.append('new_password_confirmation' ,document.getElementById('new_password_confirmation').value);

            store('/news/admin/update/password',formData)
        }

    </script>

@endsection
