@extends('layouts.app')

@section('content')
<style>
    .menu_section {
    width: 100%;
    float: left;
}
.menu_section li {
    float: left;
    list-style: none;
    margin-right: 15px;
    margin-bottom: 15px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                
                <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" class="btn btn-info">Login</a></li>
                            <li><a href="{{ route('register') }}" class="btn btn-info">Register</a></li>
                        @else
                            <li><a href="{{ route('logout') }}" class="btn btn-info" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <!--<li class="dropdown">
                                    <a href="#" >
                                        {{ Auth::user()->name }} 
                                    </a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>-->
                        @endif
                    </ul>
                    <h5>{{ ucfirst(Auth::user()->name) }} Dashboard </h5>
                </div>
                 
                <div class="panel-body">
                   
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
