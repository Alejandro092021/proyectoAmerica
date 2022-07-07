<?php

namespace App\Http\Controllers;

use App\Models\DetalleAdministrativo;
use App\Models\Maestro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$this->authorize("VerMatriculado", User::class);

        $matriculado = DetalleAdministrativo::join('users', 'detalle_administrativos.idUsuario','=', 'users.id' )
        ->join('instituciones','users.idInstitucion', '=',  'instituciones.id')
        ->where('modulo', '=', '6')
        ->where("users.name", 'LIKE', "%" . request("buscar") . "%")
        ->select('detalle_administrativos.id','users.name','detalle_administrativos.modulo','detalle_administrativos.modalidad','detalle_administrativos.educacion',
        'detalle_administrativos.nivel', 'detalle_administrativos.grado','detalle_administrativos.especialidad','detalle_administrativos.cantidad')
        //->select('*')
        ->paginate()
        ->withQueryString();
        //dd($matriculado);
        
            return Inertia::render("Docente/DocenteListar", [
                "matriculados" => $matriculado,
              ]);
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
        ->where('valor','=','6')
        ->select('nombreTabla', 'campo','valor')->get();
        $tipoestudio = Maestro::where('nombreTabla','=','TipoEstudio')->select('nombreTabla', 'campo','valor')->get();
        $nivel = Maestro::where('nombreTabla','=','Nivel')->select('nombreTabla', 'campo','valor')->get();
        $grado = Maestro::where('nombreTabla','=','Grado')->select('nombreTabla', 'campo','valor')->get();
        $especialidad = Maestro::where('nombreTabla','=','Especialidad')->select('nombreTabla', 'campo','valor')->get();
        $bimestre = Maestro::where('nombreTabla','=','Bimestre')->select('nombreTabla', 'campo','valor')->get();
        
        return Inertia::render("Docente/DocenteInsertar", [
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
        $request->validate([
            
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
                $matriculados->bimestre = null;
            }

            $matriculados->modalidad = $request->modalidad;
            $matriculados->modulo = $request->modulo;
            $matriculados->educacion = $request->tipoestudio;
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
        
        
        

        return redirect()->route('docente.index')->with('success','Registro creado satisfactoriamente');
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
    public function edit(DetalleAdministrativo $docente)
    {
        //
    
        //$this->authorize("EditarMatriculado", User::class);

        //dd($matriculado);
        $administrativo = DetalleAdministrativo::where("id",$docente->id)->with("users")->first();
        //dd($administrativo);
        
        $tipomodalidad = Maestro::where('nombreTabla','=','TipoModalidad')->select('nombreTabla', 'campo','valor')->get();
        $modulo = Maestro::where('nombreTabla','=','Modulo')
        ->where('valor','=','6')
        ->select('nombreTabla', 'campo','valor')->get();
        $tipoestudio = Maestro::where('nombreTabla','=','TipoEstudio')->select('nombreTabla', 'campo','valor')->get();
        $nivel = Maestro::where('nombreTabla','=','Nivel')->select('nombreTabla', 'campo','valor')->get();//dd($nivel);
        
        $grado = Maestro::where('nombreTabla','=','Grado')
        ->select('nombreTabla', 'campo','valor')->get();
        $especialidad = Maestro::where('nombreTabla','=','Especialidad')->select('nombreTabla', 'campo','valor')->get();
        $bimestre = Maestro::where('nombreTabla','=','Bimestre')->select('nombreTabla', 'campo','valor')->get();
        

        return Inertia::render("Docente/DocenteEditar", [
            "matriculado" => $administrativo,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleAdministrativo $docente)
    {
        //
        dd($request);
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
