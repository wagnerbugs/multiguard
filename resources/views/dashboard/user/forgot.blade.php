@extends('layouts.started')
@section('title', 'USER FORGOT PASSWORD')
@section('content')
      <div class="container">
        <div class="row">

            <h4>@yield('title')</h4>

            <form action="{{ route('user.forgot.password.link')}}" method="post" autocomplete="off">

              @if (Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
              @endif

              @if (Session::get('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif

              @csrf

              <div class="form-floating">
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="E-MAIL">
                <label for="email">E-MAIL</label>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
              </div>

              <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Resetar a senha</button>
              </div>

              <br>

              <a href="{{ route('user.login') }}">Login</a>

            </form>

        </div>
      </div>
@endsection
