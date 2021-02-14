<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-success">
               Record added.
            </div>
            @endif
            </div>
        <div class="row">
        <div class="col-sm-9">
            <h1 class="text-center">Home</h1>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success  mx-auto d-block " href="{{route('assignment.create')}}" role="button">Assignment [+]</a>
            </div>
    </div>
    </div>

    <div class="container">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Korisnik</th>
            <th scope="col">Email</th>
            <th scope="col">Projekat</th>
            <th scope="col">Zadaci</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $key=>$user)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if(!$user->projects->isEmpty())
                @foreach($user->projects as $project)
                <span>{{$project->name}}</span>
                @endforeach
                @endif
            </td>
            <td>
                @if(!$user->tasks->isEmpty())
                @foreach($user->tasks as $task)
                <span>{{$task->name}}</span>
                @endforeach
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>


    </div>

</body>
</html>
