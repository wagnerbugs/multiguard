@extends('layouts.dashboard')
@section('title', 'USER REGISTER')
@section('content')


    <div class="container">
      <div class="row">

          <h4>@yield('title')</h4>

          <form action="{{ route('user.create') }}" method="post" autocomplete="off">

            @if (Session::get('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
            @endif

            @if (Session::get('fail'))
              <div class="alert alert-danger">
                {{ Session::get('fail') }}
              </div>
            @endif

            @csrf

            <div class="form-floating">
              <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="NOME COMPLETO">
              <label for="name">NOME COMPLETO</label>
              <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>

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

            <div class="form-floating">
              <input type="password" name="cpassword" id="cpassword" value="{{ old('cpassword') }}" class="form-control" placeholder="REPITA O PASSWORD">
              <label for="cpassword">REPITA O PASSWORD</label>
              <span class="text-danger">@error('cpassword') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Registrar-se</button>
            </div>

            <br>

            <a href="{{ route('user.login') }}">Já tenho uma conta</a>

          </form>

      </div>
    </div>

@endsection
