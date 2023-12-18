<nav class="navbar navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand"><b style="color: white">Customer Section</b></a>
    <form class="form-inline">
        @if(\Route::current()->getName() == 'login')
            <label style="color: white;font-weight: bold">Don't you have an account ??</label>&nbsp;&nbsp;
            <a href="{{route('registration')}}" class="btn btn-success">Signup</a>
        @endif
    </form>
</nav>
