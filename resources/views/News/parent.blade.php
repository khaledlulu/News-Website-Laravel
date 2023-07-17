{{-- هادي الطرقة لو بدي استدعي المودل الخاص بالمتغير الي عندي في هذه الصفحة على سبيل المثال
           بدل ما استدعي المودل تبعو واعرف كومباكت في الفنكشن تبع  الصفحة هادي (catergories) هان عندي
         باجي بكتب الاتي في راس الصحة ومن دون كتابة الكومباكت

<?php
$categories = Category::all();
?>
           --}}


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News | @yield('titel')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('News/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('News/css/modern-business.css') }}" rel="stylesheet">

    @yield('style')

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">News</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>


                @foreach($categories as $category)

                <li class="nav-item">
                    <a class="nav-link" href="#">{{ $category->name }}</a>
                </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.contact') }}">Contact</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

@yield('content')



<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Khaled LuLu 2023</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('News/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('News/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('cms/js/crud.js') }}"></script>
@yield('script')

</body>

</html>

{{-- صفحة لتوريث الناف بار والفوتر ولا تظهر في الموقع عند رقعه  --}}
