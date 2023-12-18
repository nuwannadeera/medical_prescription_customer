<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
				initial-scale=1.0">
    <title>Bootstrap5 Sidebar</title>
    <link href="{{asset('bootstrap/css/style.css')}}" rel="stylesheet">
{{--<link href=--}}
{{--"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"--}}
{{--rel="stylesheet"--}}
{{--integrity=--}}
{{--"sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"--}}
{{--crossorigin="anonymous">--}}
<!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href=
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity=
          "sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"/>
</head>
<body>
<div class="container-fluid p-0 d-flex h-100">
    <div id="bdSidebar"
         class="d-flex flex-column flex-shrink-0 p-3 bg-success text-white offcanvas-md offcanvas-start">
        <a href="#" class="navbar-brand"></a>
        <button class="btn btn-lg btn-primary">{{auth()->user()->name}}</button>
        <hr>
        <ul class="mynav nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-1">
                <a href="#">
                    <i class="fa-regular fa-user"></i>
                    Add Prescription
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="#">
                    <i class="fa-regular fa-bookmark"></i>
                    View Quotations
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="{{route('logout')}}">
                    <i class="fa-regular fa-bookmark"></i>
                    Logout
                </a>
            </li>
        </ul>
        <hr>
    </div>

    <div class="bg-light flex-fill">
        <div class="p-2 d-md-none d-flex text-white bg-success">
            <a href="#" class="text-white" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar">
                <i class="fa-solid fa-bars"></i>
            </a>
            <span class="ms-3">GFG Portal</span>
        </div>
        <div class="p-4">
            <div class="row">
                <div class="col">
                    <p>Page content goes here</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
