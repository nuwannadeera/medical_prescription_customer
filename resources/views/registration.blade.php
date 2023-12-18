@extends('lgrlayout')
@section('title','Registration')
@section('lgrContent')

    <div class="container">
        <div class="mt-3">
            @if($errors->any())
                <div class="row flex-row-reverse">
                    @foreach($errors->all() as $error)
                        <div class="col-md-3">
                            <div class="alert alert-danger" style="font-size: 13px;font-weight: bold">{{$error}}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="row">
                    <div class="col-md-5">
                        <div class="alert alert-danger">{{session('error')}}</div>
                    </div>
                </div>
            @endif

            @if(session()->has('success'))
                <div class="row">
                    <div class="col-md-5">
                        <div class="alert alert-success">{{session('success')}}</div>
                    </div>
                </div>
            @endif
        </div>
        <form action="{{route('registrationPost')}}" method="POST" class="ms-auto mr-auto ml-auto me-auto mt-auto"
              style="width: 500px">
            @csrf
            <div class="form-group">
                <label style="font-weight: bold">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter Full Name" name="name">
            </div>
            <div class="form-group">
                <label style="font-weight: bold">E-mail</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
                <label style="font-weight: bold">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
            </div>
            <div class="form-group">
                <label style="font-weight: bold">Address</label>
                <input type="text" class="form-control" placeholder="Enter Address" name="address">
            </div>
            <div class="form-group">
                <label style="font-weight: bold">Contact No</label>
                <input type="text" class="form-control" placeholder="Enter Contact No" name="contactNo">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: bold">DOB</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: bold">Type</label>
                        <select class="custom-select" name="type">
                            <option>Select Type</option>
                            <option value="1">Customer</option>
                            <option value="2">Pharmacy User</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>


@endsection
