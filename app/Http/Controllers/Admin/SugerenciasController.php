<?php

namespace App\Http\Controllers\Admin;

use App\Models\sugerencias;
use App\Models\empleados;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SugerenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sugerencia = sugerencias::all();
        return view('admin.sugerencias.index', compact('sugerencia'));
        
    }

    public function indexAjax(Request $request){
        $sugerencia = sugerencias::all();
        return response()->json($sugerencia);
    }

    public function buscaCedula(Request $request){
        $datos = $request->all();
        // return response()->json($datos);
        $cedula = $datos['cedula'];
        $empleado = empleados::where([['status_t','=',null],['cedula','=',$cedula]])->
                            select('num_emp',rtrim(ltrim('nom1_emp')),rtrim(ltrim('apell1_emp')))->
                            first();
        if ($empleado === null) {
            return response()->json(array("data" => null, "code" => 501, "msj" => "No existe este empleado"));
        }
        return response()->json(array("data" => $empleado, "code" => 201, "msj" => ""));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sugerencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $cedula = $datos['cedula'];

        if ($datos['contacto'] !== null) {
            $datos['auditoria'] = 'si';
        }else{
            $datos['auditoria'] = 'no';
        }
        
        $empleado = empleados::where([['status_t','=',null],['cedula','=',$cedula]])->
                            select('num_emp','nom1_emp','apell1_emp')->
                            first();
                                              
        if ($empleado !== null) {
            $datos['nombre'] = $empleado->nom1_emp;
            $datos['apellido'] = $empleado->apell1_emp;
            $datos['usuario_creador' ] = $empleado->num_emp;         
        }
         
        $messages = ['required' => 'El campo :attribute es requerido.',
                     'exists'   => 'La :attribute ingresada no existe.',];

        validator($datos, [
            'cedula'           => 'required|exists:empleados,cedula',
            'tipo'             => 'required',
            'nombre'           => 'required',
            'apellido'         => 'required',
            'descripcion'      => 'required',
            'usuario_creador'  => 'required'
        ],$messages);
       
        try {            
            sugerencias::create($datos);
            return redirect()->route('admin.sugerencias.create'); 
        }
        catch (\Exception $e ){                
            return response()->json(array("data" => $e->getMessage(), "code" => 501, "msj" => "Respuesta Exitosa"), 501);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sugerencias  $sugerencias
     * @return \Illuminate\Http\Response
     */
    public function show(sugerencias $sugerencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sugerencias  $sugerencias
     * @return \Illuminate\Http\Response
     */
    public function edit(sugerencias $sugerencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sugerencias  $sugerencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sugerencias $sugerencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sugerencias  $sugerencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(sugerencias $sugerencias)
    {
        //
    }
}
