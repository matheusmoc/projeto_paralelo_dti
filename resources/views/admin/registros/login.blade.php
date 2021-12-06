<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--bootstrap-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjU"></script>

<body style="background-color: rgb(2, 2, 160);" >
<div class="d-flex justify-content-center mt-5">
    <div class="card" style="width: 30rem;  box-shadow: 20px 20px 10px rgb(6, 0, 92);">
        <div class="card-body mb-5" style="flex-direction:column; aligin-items:center;  justify-content: center;">
            <h5 class="card-title mb-4">Login Administrativo</h5>

            <form action="{{route('registros.login')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="usuario" value="{{old('usuario')}}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">{{$errors->has('usuario') ? $errors->first('usuario') : ''}}</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input name='senha' value="{{old('senha')}}" type="password" class="form-control" id="exampleInputPassword1">
                    <div id="emailHelp" class="form-text">{{$errors->has('senha') ? $errors->first('senha') : ''}}</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Lembrar</label>
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>

            {{isset($erro) && $erro !=  '' ? $erro : ''}}
            </form>
        </div>
    </div>
</div>

</body>
