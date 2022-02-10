<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body class="bg-info">
    <div class="container">
      <div class="row">
        <div class="col-4">
          <h4>User Login</h4>
          <form action="{{ route('admin.check') }}" method="post" autocomplete="off">
            @if (Session::get('fail'))
              <div class="alert alert-danger">
                {{ Session::get('fail') }}
              </div>
            @endif
            @csrf
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
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
