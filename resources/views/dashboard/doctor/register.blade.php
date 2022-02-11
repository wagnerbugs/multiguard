@extends('layouts.dashboard')
@section('title', 'DOCTOR REGISTER')
@section('content')

    <div class="container">
      <div class="row">

          <h4>@yield('title')</h4>

          <form action="{{ route('doctor.create') }}" method="post" autocomplete="off">

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
              <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="NOME COMPLETO">
              <label for="name">NOME COMPLETO</label>
              <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>

            <div class="form-floating">
              <input type="text" name="hospital" value="{{ old('hospital') }}" class="form-control" placeholder="HOSPITAL">
              <label for="hospital">HOSPITAL</label>
              <span class="text-danger">@error('hospital') {{ $message }} @enderror</span>
            </div>

            <div class="form-floating">
              <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-MAIL">
              <label for="email">E-MAIL</label>
              <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>

            <div class="form-floating">
              <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="PASSWORD">
              <label for="password">PASSWORD</label>
              <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>

            <div class="form-floating">
              <input type="password" name="cpassword" value="{{ old('cpassword') }}" class="form-control" placeholder="REPITA O PASSWORD">
              <label for="cpassword">CREPITA O PASSWORD</label>
              <span class="text-danger">@error('cpassword') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Cadastrar-se</button>
            </div>

            <br>

            <a href="{{ route('doctor.login') }}">Já tenho uma conta</a>

          </form>

      </div>
    </div>
@endsection
