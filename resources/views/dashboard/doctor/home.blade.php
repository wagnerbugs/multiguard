<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h4>Doctor Dashboard</h4>
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Hospital</th>
                <th>Email</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ Auth::guard('doctor')->user()->name }}</td>
                <td>{{ Auth::guard('doctor')->user()->hospital }}</td>
                <td>{{ Auth::guard('doctor')->user()->email }}</td>
                <td>
                    <a href="{{ route('doctor.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sair</a>
                    <form action="{{ route('doctor.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
