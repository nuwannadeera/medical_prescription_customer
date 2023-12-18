@extends('lgrlayout')
@section('title','Login')
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
                    <div class="row flex-row-reverse">
                    <div class="col-md-5">
                        <div class="alert alert-danger">{{session('error')}}</div>
                    </div>
                </div>
            @endif

            @if(session()->has('success'))
                    <div class="row flex-row-reverse">
                    <div class="col-md-5">
                        <div class="alert alert-success">{{session('success')}}</div>
                    </div>
                </div>
            @endif
        </div>
        <form action="{{route('login.post')}}" method="POST" class="ms-auto mr-auto ml-auto me-auto mt-auto"
              style="width: 500px">
            @csrf
            <br>
            <div class="form-group">
                <label>E - mail</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter Mobile No" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Log in</button>
        </form>
    </div>

@endsection
