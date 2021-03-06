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

@foreach($usuarios as $usuario)
<section class="content">

    <div class="card" style="width: 18rem;">
     <img src="#" class="card-img-top" alt="...">
     <div class="card-body">
    <h5 class="card-title">{{$usuario->name}}</h5>
    <p class="card-text"></p>
    <form action="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" method="post">
        @csrf
        @method('DELETE')
         <button type="submit" class="btn btn-sm bg-danger mb-2">
            <i class="fas fa-trash"></i> Desativar
         </button>
    </form>
    <a class="btn btn-sm bg-primary mb-2" href="{{route('usuarios.show', ['usuario'=>$usuario->id])}}">Perfil</a>
  </div>
</div>
</section>

@endforeach  

@stop