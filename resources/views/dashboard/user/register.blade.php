<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Register</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <h4>User Register</h4>
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
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" name="name" value="{{ old('name') }}" class="form-control">
              <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control">
              <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" name="password" value="{{ old('password') }}" class="form-control">
              <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
              <label for="cpassword">Confirme a Senha</label>
              <input type="password" name="cpassword" value="{{ old('cpassword') }}" class="form-control">
              <span class="text-danger">@error('cpassword') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <br>
            <a href="{{ route('user.login') }}">Já tenho uma conta</a>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
