<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h4>Admin Dashboard</h4>
          <table class="table">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ Auth::guard('admin')->user()->name }}</td>
                <td>{{ Auth::guard('admin')->user()->phone }}</td>
                <td>{{ Auth::guard('admin')->user()->email }}</td>
                <td>
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sair</a>
                    <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </body>
</html>
