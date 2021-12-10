@extends('adminlte::page')

@section('title', 'Tickets')

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
<li>
    <a href="{{route('registros.logout')}}">Sair</a>
</li>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><strong>Tickets</strong></h3>
        </div>

        {{-- menssagem popup --}}
        @if (session('message'))
        <div class="alert alert-success" role="alert">
            <p>
                {{ session('message') }}
            </p>
        </div>
        @endif


        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                aria-controls="example1" type="button">
                                <span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5"
                                tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button
                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1"
                                type="button"><span>Excel</span></button> <button
                                class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1"
                                type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print"
                                tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                            <div class="btn-group"><button
                                    class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0"
                                    aria-controls="example1" type="button" aria-haspopup="true"
                                    aria-expanded="false"><span>Column visibility</span></button></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Data de criação</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Nome</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Assunto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registros as $registro)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $registro->id }}</td>
                                        <td>{{ $registro->updated_at }}</td>
                                        <td>{{ $registro->nome }} {{ $registro->sobrenome }}</td>
                                        <td>{{ $registro->email }}</td>
                                        <td>{{ $registro->assunto ? $registro->assunto->registro_assunto : '' }}</td>
                                        
                                        <td><a class="btn btn-primary"
                                                href="{{ route('registros.show', ['registro' => $registro->id]) }}">Visualizar</a>
                                        </td>
                                        
                                        
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ route('registros.edit', ['registro' => $registro->id]) }}">Editar</a>
                                        </td>
                                        

                                        <td>
                                            <form action="{{ route('registros.destroy', ['registro' => $registro->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
        <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
      </tfoot> --}}
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of
                            57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#"
                                        aria-controls="example1" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example1"
                                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2"
                                        tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3"
                                        tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4"
                                        tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5"
                                        tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6"
                                        tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                        aria-controls="example1" data-dt-idx="7" tabindex="0"
                                        class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@stop
