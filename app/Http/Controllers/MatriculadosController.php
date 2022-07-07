<?php

namespace App\Http\Controllers;

use App\Exports\MatriculadosExport;
use App\Models\DetalleAdministrativo;
use App\Models\Instituciones;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Maestro;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        $this->authorize("VerMatriculado", User::class);

        $matriculado = DetalleAdministrativo::join('users', 'detalle_administrativos.idUsuario','=', 'users.id' )
        ->join('instituciones','users.idInstitucion', '=',  'instituciones.id')
        ->where('modulo', '=', '1')
        ->where("users.name", 'LIKE', "%" . request("buscar") . "%")
        ->select('detalle_administrativos.id','users.name','detalle_administrativos.modulo','detalle_administrativos.modalidad','detalle_administrativos.educacion',
        'detalle_administrativos.nivel', 'detalle_administrativos.grado','detalle_administrativos.cantidad')
        //->select('*')
        ->paginate()
        ->withQueryString();
        //dd($matriculado);
        
            return Inertia::render("Matriculados/MatriculadosLista", [
                "matriculados" => $matriculado,
              ]);
    }

    public function export(Request $request){
        return Excel::download(new MatriculadosExport($request->buscar),'GREA-Matriculados.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize("CrearMatriculado", User::class);

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
        //dd($request);
        $this->authorize("CrearMatriculado", User::class);
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
                $matriculados->bimestre = $request->bimestre;
            }

            
            $matriculados->modalidad = $request->modalidad;//dd($matriculados->modalidad);
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
        
        
        

        return redirect()->route('matriculados.index')->with('success','Registro creado satisfactoriamente');
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
    public function edit(DetalleAdministrativo $matriculado)
    {
        //
        $this->authorize("EditarMatriculado", User::class);

        //dd($matriculado);
        $administrativo = DetalleAdministrativo::where("id",$matriculado->id)->with("users")->first();
        //dd($administrativo);
        $instituciones = Instituciones::where("id",$matriculado->institucion)->get();
        //dd($instituciones);
        
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
        

        return Inertia::render("Matriculados/MatriculadosEditar", [
            "matriculado" => $administrativo,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleAdministrativo $matriculado)
    {
        //
        //dd($request);
        $this->authorize("EditarMatriculado", User::class);

        try {
            //code...
            DB::beginTransaction();
            
            $matriculados = DetalleAdministrativo::where('id',$matriculado->id)->first();
            $matriculados->modalidad = $request->modalidad;
            $matriculados->modulo = $request->modulo;
            $matriculados->educacion = $request->tipoestudio;
            $matriculados->nivel = $request->nivel;
            $matriculados->grado = $request->grado;
            $matriculados->cantidad = $request->cantidad;
            $matriculados->UsuarioCreador = null;
            $matriculados->UsuarioEditor = $request->usuarioeditor;
            $matriculados->idUsuario = $request->idusuario;
            $matriculados->update();
            DB::commit();

        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            return response()->json(['error' => $e]);
        }
        return redirect()->route('matriculados.index')->with('success','Registro actualizado satisfactoriamente');
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
