@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Sugerencia</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-body">
            {!!Form::open(['route' => 'admin.sugerencias.store']) !!}
                <div class="form-group">
                    {!!Form::label('cedula', 'Cedula')!!}
                    {!!Form::text('cedula', '',['class'=>'form-control col-3 cedula'])!!}      

                    @error('cedula')
                        <span class="text-danger">{{$message}}</span>
                    @enderror          
                </div>

                <div class="form-group">
                    {!!Form::label('empleado', 'Empleado')!!}
                    {!!Form::text('empleado', '',['class'=>'form-control col-3 empleado','readonly'])!!}        
                </div>

                <div class="form-group">
                    {!!Form::label('tipo', 'TIpo')!!}
                    {!!Form::select('tipo', ['Administración' => 'Administracion',
                                             'Cafetería' => 'Cafeteria',                                             
                                             'Producción' => 'Produccion',
                                             'Colaboradores' => 'Colaboradores',
                                             'Seguridad & Medio ambiente' => 'Seguridad & Medio ambiente',
                                             'Supervisores' => 'Supervisores',
                                             'Motivos personales' => 'Motivos personales',
                                             'Herramientas de trabajo' => 'Herramientas de trabajo',
                                             'Otros' => 'Otros'
                    ], 'Administracion', ['class' => 'form-control col-3'])!!}

                    @error('tipo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror 
                </div>

                <div class="form-group">
                    {!!Form::label('contacto', 'Telefono')!!}
                    {!!Form::text('contacto', '',['class'=>'form-control col-3'])!!}  
                    <span class="text-info">Ingrese número telefónico o corréo si esta de acuerdo en que sea contactado.</span>       
                </div>

                <div class="form-group">
                    {!!Form::label('descripcion', 'Descripcion')!!}
                    {!!Form::textarea('descripcion', '',['class'=>'form-control'])!!}    
                    
                    @error('descripcion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror 
                </div>

                {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
            {!!Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script> 
    $(document).ready(function(){
        $( ".cedula" ).blur(function() {
            if ($(".cedula").val() == '') {
                $(".cedula").focus();                
                return;
            }else{
                $.ajax({
                    url:'/admin/cedula-empleado',
                    method: 'GET',
                    data: $('form').serialize()
                }).done(function (resp) {
                    console.log(resp.data);
                    $(".empleado").val('');
                    if (resp.data === null) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Esta cédula no pertenece a un empleado.',
                            showConfirmButton: true,
                            // timer: 2000
                        });
                        $(".cedula").val('');
                        $(".cedula").focus();                
                        return;
                        // return;
                    } else {
                        $(".empleado").val($.trim(resp.data.nom1_emp)+' '+$.trim(resp.data.apell1_emp));                   
                    }
                })
            }
        });
    })
</script>
@stop
