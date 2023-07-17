@extends('cms.parant')


@section('titel','Create  Slider')

@section('style')

@endsection
@section('Maintitel','Create Slider')

@section('subtitel','create slider')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Slider</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image" placeholder="Enter Image">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="video">Video</label>
                                    <input type="file" name="video" class="form-control" id="video" placeholder="Enter Video">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title for Slider">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_description">Description</label>
                                    <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter Short description of slider ">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                <a href='#' type="button" onclick="performStore()" class="btn btn-primary">Store</a>
                                <a href="{{ route('sliders.index') }}" type="button" class="btn btn-primary">Slider
                                    </a>

                            </div>
                    </form>
                </div>



</section>
@endsection

@section('script')
 {{-- <script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script> --}}

<script>

    function performStore() {
        let formData = new FormData();
        formData.append('image',document.getElementById('image').files[0]);
        formData.append('video',document.getElementById('video').files[0]);
        formData.append('title', document.getElementById('title').value);
        formData.append('short_description', document.getElementById('short_description').value);

        store('/news/admin/sliders', formData);

    }


</script>
@endsection
