@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de sugerencias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Auditoria</th>
                    <th scope="col">Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sugerencia as $item)
                        <tr>
                            <td>{{$item->cedula}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->apellido}}</td>
                            <td>{{$item->tipo}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->auditoria}}</td>
                            <td>{{$item->contacto}}</td>
                            {{-- <td>
                                <button type="button" class="btn btn-primary">Primary</button>
                                <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop
