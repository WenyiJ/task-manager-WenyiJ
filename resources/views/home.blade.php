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

                    You are logged in as <strong>USERS</strong>!
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
                    <h2 class="display-4 my-3">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
 <span class="caret">'s Lists</h2>
                    
                        <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h2>Lists</h2>
                        <h2> {{ count($groups) }} </h2>
                        </div>
                        <div class="card-body">
                            
                                @foreach($groups as $group)
                                  
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                    <form action="/group/edit/{{$group->id}}" method="POST">
                                                @csrf
                                                @method('put')
                                                <a href="/group/edit/{{$group->id}}" class="btn btn-light" ><i class="fas fa-pencil-alt"></i></a>
                                    </form>   
                                    <form class="ml-3 mr-3" action="/group/{{$group->id}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <a href="/group/{{$group->id}}" class="btn btn-outline-{{$group->color}}
                                        btn-lg btn-block ml-3 mr-3" >{{$group->title}}</a>
                                    </form>
                                    <form method="post" action="/group/{{$group->id}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    </div>
                               @endforeach
                            
                        </div>
                    </div>
                        
                    </div>
                
            </div>



            
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>New List</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/group">
                                @csrf
                              
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="title" id="" class="form-control" placeholder="Group Title">
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="color">
                                            <option>Select a Color</option>
                                            <option value="danger">Red</option>
                                            <option value="primary">Blue</option>
                                            <option value="success">Green</option>
                                            <option value="warning">Orange</option>
                                            <option value="secondary">Gray</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                         <button type="submit" class="btn btn-success" name="name">Create List</button>    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <ul class="list-group">
                @foreach($groups as $group)
                <li class="list-group-item d-flex align-items-center">
                    <form action="/group/{{$group->id}}" method="post">
                        @csrf
                        @method('put')
                   
                    <button class="btn
                       
                    "><i class="fas fa-check"></i></button>
                    </form>
                    
                <form class="ml-auto" action="/group/{{$group->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
                    
                </li>
                @endforeach
                <li class="list-group-item">
                    <form action="/group" method="post">
                        @csrf
                    <input type="text" name="name" id="">
                    </form>
                </li>
            </ul> --}}

        </div>
    </main>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>