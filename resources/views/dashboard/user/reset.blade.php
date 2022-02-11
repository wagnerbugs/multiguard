@extends('layouts.started')
@section('title', 'USER RESET PASSWORD')
@section('content')
      <div class="container">
        <div class="row">

            <h4>@yield('title')</h4>

            <form action="{{ route('user.reset.password') }}" method="post" autocomplete="off">

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

              <input type="hidden" name="token" value="{{$token}}">

              <div class="form-floating">
                <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" class="form-control" placeholder="E-MAIL">
                <label for="email">E-MAIL</label>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
              </div>

              <div class="form-floating ">
                <input type="password" name="password" id="password"  value="{{ old('password') }}" class="form-control" placeholder="PASSWORD">
                <label for="password">PASSWORD</label>
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
              </div>

              <div class="form-floating mb-2">
                <input type="password" name="password_confirmation" id="password_confirmation"  value="{{ old('password') }}" class="form-control" placeholder="REPITA O PASSWORD">
                <label for="password_confirmation">REPITA O PASSWORD</label>
                <span class="text-danger">@error('password_confirmation') {{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Resetar senha</button>
              </div>

              <br>

              <a href="{{ route('user.login') }}">Login</a>

            </form>

        </div>
      </div>
@endsection
