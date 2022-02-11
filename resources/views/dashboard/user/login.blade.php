@extends('layouts.started')
@section('title', 'USER LOGIN')
@section('content')
      <div class="container">
        <div class="row">

            <h4>@yield('title') {{env('APP_ENV')}}</h4>

            <form action="{{ route('user.check') }}" method="post" autocomplete="off">

              @if (Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
              @endif

              @if (Session::get('info'))
                <div class="alert alert-info">
                  {{ Session::get('info') }}
                </div>
              @endif

              @csrf

              <div class="form-floating">
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="E-MAIL">
                <label for="email">E-MAIL</label>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
              </div>

              <div class="form-floating mb-2">
                <input type="password" name="password" id="password"  value="{{ old('password') }}" class="form-control" placeholder="PASSWORD">
                <label for="password">PASSWORD</label>
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
              </div>

              <a href="{{ route('user.forgot.password.form') }}">Esqueci a senha</a>

              <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>

              <br>

              <a href="{{ route('user.register') }}">Criar nova conta</a>

            </form>

        </div>
      </div>
@endsection
