@extends('template.main')
@section('content')
<div class="container">
    <form action="{{ action('AccountController@login') }}" method="post">
        {{csrf_field() }}
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <h3>Login<hr /></h3>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="Email address" />
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-sm" placeholder="Your password" />
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>

            </div>
        </div>
    </form>
</div>
@endsection