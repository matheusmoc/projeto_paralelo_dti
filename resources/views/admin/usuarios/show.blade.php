@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjU"></script>
@stop

@section('content')

<body>
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="#" alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{$usuarios->name}}</h3>

        <p class="text-muted text-center">{{$usuarios->unidade}}</p>

        {{-- <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Followers</b> <a class="float-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Following</b> <a class="float-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="float-right">13,287</a>
          </li>
        </ul> --}}

        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Dados cadastrais</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong><i class="fas fa-book mr-1"></i> CPF</strong>

        <p class="text-muted">
        {{$usuarios->cpf}}
        </p>

        <hr>

        <strong><i class="fas fa-map-marker-alt mr-1"></i> Estado / Cidade</strong>

        <p class="text-muted">{{$usuarios->cidade}}, {{$usuarios->estado}}</p>

        <hr>

        <strong><i class="fas fa-pencil-alt mr-1"></i> Telefone</strong>

        <p class="text-muted">
          {{-- <span class="tag tag-danger">UI Design</span>
          <span class="tag tag-success">Coding</span>
          <span class="tag tag-info">Javascript</span>
          <span class="tag tag-warning">PHP</span> --}}
          <span class="tag tag-primary">{{$usuarios->telefone}}</span>
        </p>

        <hr>

        <strong><i class="far fa-file-alt mr-1"></i> Cargo</strong>

        <p class="text-muted">{{$usuarios->cargo}}</p>

        <hr>

        <strong><i class="far fa-file-alt mr-1"></i> Quantidade de registros</strong>

        <p class="text-muted">{{$registros->count()}}</p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
  </div>
</div>
</div>
</body>

@stop
