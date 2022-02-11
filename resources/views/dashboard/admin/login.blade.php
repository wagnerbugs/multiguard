@extends('layouts.started')
@section('title', 'ADMIN LOGIN')
@section('content')

    <div class="container">
      <div class="row">

          <h4>@yield('title')</h4>

          <form action="{{ route('admin.check') }}" method="post" autocomplete="off">

            @if (Session::get('fail'))
              <div class="alert alert-danger">
                {{ Session::get('fail') }}
              </div>
            @endif

            @csrf

            <div class="form-floating">
              <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="E-MAIL">
              <label for="email">E-MAIL</label>
              <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>

            <div class="form-floating">
              <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="PASSWORD">
              <label for="password">PASSWORD</label>
              <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>

          </form>

      </div>
    </div>

@endsection
