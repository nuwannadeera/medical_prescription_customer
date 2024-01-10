<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,
				initial-scale=1.0">
    <title>@yield('title','Customer Auth')</title>
    <link href="{{asset('bootstrap/css/style.css')}}" rel="stylesheet">
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
            @if(auth()->user()->type == 1)
                <li class="nav-item mb-1">
                    <a href="{{route('prescription')}}">
                        <i class="fa-regular fa-user"></i>
                        Add Prescription
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{route('getAllCustomerQuotations')}}">
                        <i class="fa-regular fa-bookmark"></i>
                        View Quotations
                    </a>
                </li>
            @else
                <li class="nav-item mb-1">
                    <a href="{{route('getAllPrescriptions')}}">
                        <i class="fa-regular fa-user"></i>
                        Pres. Summary
                    </a>
                </li>
                {{--<li class="nav-item mb-1">--}}
                {{--<a href="{{route('viewQuotation')}}">--}}
                {{--<i class="fa-regular fa-bookmark"></i>--}}
                {{--Add Quotation--}}
                {{--</a>--}}
                {{--</li>--}}
            @endif
            <li class="nav-item mb-1">
                <a href="{{route('logout')}}">
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </li>
        </ul>
        <hr>
    </div>

    <div class="bg-light flex-fill">
        <div class="p-4">
            @yield('dashboardContent')
        </div>
    </div>
</div>
</body>
</html>
