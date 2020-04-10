{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="http://task-manager-wenyij.test/">
                Tasks
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                            {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
 <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="http://task-manager-wenyij.test/login" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="/logout" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="d-flex justify-content-between display-4 my-3 text-success"><span></span><span>{{ \DB::table('tasks')->count()}}</span></h2>
      
        <div class="card">
            <div class="card-header"><h2>Tasks</h2></div>
            <div class="card-body">
                @foreach ($tasks as $task)
                <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex align-items-center justify-content-between">
                                            <form class="d-flex align-items-baseline" action="/task/{id}" method="POST">
                                            <input id="group_id" name="completed" type="hidden" value="">
                                                
                            @csrf
                            @method('put')
                            
                            <input type="hidden" name="completed" value="{{$task->completed ? 0 :1}}">
                        <button class="btn
                        @if ($task->completed)
                        btn-checked
                    @else
                        btn-unchecked
                    @endif
                        "><i class="fas fa-check"></i></button>
                        <p>{{$task->description}}</p>
                        </form>
                        <form action="/task" method="POST">
                           
                            @csrf
                            @method('delete')                                
                          
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </li>
                </ul>
           @endforeach
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header"><h3>New Task</h3></div>
            <div class="card-body">
                <form action="/task" method="POST">
                    @csrf                        
                 
                    <div class="form-group">
                        <input type="text" class="form-control" name="description" placeholder="Task">
                    </div>
                    <button class="btn btn-secondary">Add Task</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    </main>
</body>
</html>