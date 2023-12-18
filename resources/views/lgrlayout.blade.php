<!doctype html>
<html lang="en" xmlns:x="12">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Customer Auth')</title>
    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper -->
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3/js/bootstrap.min.js"></script>--}}
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>
@include('lgrInclude.header')
@yield('lgrContent')
</body>
</html>
