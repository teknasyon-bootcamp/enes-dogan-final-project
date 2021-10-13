<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>News Report</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">


    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/assets/css/main.css" rel="stylesheet">
    <link href="/assets/css/all.min.css" rel="stylesheet">
</head>
<body>
@include ("layout.navbar")

<main class="container">
    @yield('headline')
    @yield('featuredNews')

    <div class="row g-5">
        <div class="col-md-8">
            @yield('content')
        </div>

        <div class="col-md-4">
            @if(\Illuminate\Support\Facades\Auth::check())
                @include("layout.advertisement")
            @endif
        </div>
    </div>

</main>
@include("layout.footer")


</body>
</html>
