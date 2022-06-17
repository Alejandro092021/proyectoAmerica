<?php

namespace App\Http\Controllers;

use App\Exports\InstitucionesExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Instituciones;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$Institucion = Instituciones::select("*")->get();
        $Institucion = Instituciones::where("codigoModular","LIKE","%" . request("buscar") . "%")
        ->orWhere("codigoLocal","LIKE","%" . request("buscar") . "%")
        ->select("*")
        ->paginate()
        ->withQueryString();
        return Inertia::render("Instituciones/InstitucionesListar",[
            "Institucion" => $Institucion,
        ]);
    }

    public function export(Request $request){
        return Excel::download(new InstitucionesExport($request->buscar),'SIA-Instituciones.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
