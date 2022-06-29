<?php

namespace App\Http\Controllers;

use App\Models\DetalleAdministrativo;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Maestro;
use Illuminate\Support\Facades\DB;

class MatriculadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $modulo = DetalleAdministrativo::join('users', 'detalle_administrativos.idUsuario','=', 'users.id' )
        ->join('instituciones','users.idInstitucion', '=',  'instituciones.id')
        ->join('maestros as da', 'da.valor', '=', 'detalle_administrativos.tipoModulo')
        ->where('da.nombreTabla', '=', 'Modulo')
            ->select('*')->get();
            /*
        $modulo = User::join('detalle_administrativos as da', 'users.id', '=', 'da.idUsuario')
            //->join('instituciones', 'users.idInstitucion', '=', 'instituciones.id')
            ->join('maestros as mc', 'mc.valor', '=', 'users.Cargo')
            ->where('mc.nombreTabla', '=', 'Cargo')
            //->join('maestros as tm', 'tm.valor', '=', 'instituciones.tipoZona')
            //->where('tm.nombreTabla', '=', 'TipoZona')
            ->join('maestros as tmo', 'tmo.valor', '=', 'da.tipoModalidad')
            ->where('tmo.nombreTabla', '=', 'TipoModalidad')
        ->select('*')->get();*/
            dd($modulo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $instituciones = User::join('instituciones','instituciones.id','=','users.idInstitucion')
        ->where('users.estado','=','1')
        ->get();//dd($matriculados);

        $tipomodalidad = Maestro::where('nombreTabla','=','TipoModalidad')->select('nombreTabla', 'campo','valor')->get();
        $modulo = Maestro::where('nombreTabla','=','Modulo')
        ->where('valor','=','1')
        ->select('nombreTabla', 'campo','valor')->get();
        $tipoestudio = Maestro::where('nombreTabla','=','TipoEstudio')->select('nombreTabla', 'campo','valor')->get();
        $nivel = Maestro::where('nombreTabla','=','Nivel')->select('nombreTabla', 'campo','valor')->get();//dd($nivel);
        
        $grado = Maestro::where('nombreTabla','=','Grado')
        ->select('nombreTabla', 'campo','valor')->get();
        $especialidad = Maestro::where('nombreTabla','=','Especialidad')->select('nombreTabla', 'campo','valor')->get();
        $bimestre = Maestro::where('nombreTabla','=','Bimestre')->select('nombreTabla', 'campo','valor')->get();
        
    
        return Inertia::render("Matriculados/MatriculadosInsertar", [
            "instituciones" => $instituciones,
            "tipomodalidad" => $tipomodalidad,
            "modulo" => $modulo,
            "tipoestudio" => $tipoestudio,
            "nivel" => $nivel,
            "grado" => $grado,
            "especialidad" => $especialidad,
            "bimestre" => $bimestre,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize("CrearMatriculado", User::class);
        $request->validate([
            "institucion"=>"required",
            "modalidad"=>"required",
            "modulo"=>"required",
            "tipoestudio"=>"required",
            "nivel"=>"required",
            "grado"=>"required",

        ]);
        try {
            //code...
            DB::beginTransaction();
            $matriculados = new DetalleAdministrativo();

            if ($request->especialidad == "" && $request->bimestre == "") {
                # code...
                $matriculados->especialidad = null;
                $matriculados->bimestre = null;
            }else {
                # code...
                $matriculados->especialidad = $request->especialidad;
                $matriculados->bimestre = $request->bimestre;
            }

            $matriculados->institucion = $request->institucion;
            $matriculados->tipoModalidad = $request->modalidad;
            $matriculados->tipoModulo = $request->modulo;
            $matriculados->tipoEducacion = $request->tipoestudio;
            $matriculados->nivel = $request->nivel;
            $matriculados->grado = $request->grado;
            $matriculados->cantidad = $request->cantidad;
            $matriculados->usuarioCreador = $request->usuariocreador;
            $matriculados->usuarioEditor = null;
            $matriculados->idUsuario = $request->idusuario;
            $matriculados->save();

            DB::commit();

        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            return response()->json(['error' => $e]);
        }





        //
        //dd($request);
        
        
        

        return redirect()->route('matriculados.create')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
