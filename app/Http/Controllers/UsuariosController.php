<?php

namespace App\Http\Controllers;

use App\Imports\InstitucionesImport;
use App\Models\Persona;
use App\Models\Trabajadore;
use Illuminate\Http\Request;
//importamos estas clases
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

use App\Models\Maestro;
use App\Models\Instituciones;

use Maatwebsite\Excel\Facades\Excel;

use Rap2hpoutre\FastExcel\FastExcel;

class UsuariosController extends Controller
{
  public function index(Request $request)
  {
    /*
    $Institucion = Instituciones::join('users','users.idInstitucion','=','instituciones.id')
    ->join('maestros','maestros.valor','=','users.Cargo')
    ->where('maestros.nombreTabla', '=', 'Cargo')
    ->select('*')->get();*/

    /*$nombres = Persona::join('trabajadores as t','t.persona_id','=','personas.id')
    //$consulta = Persona::join('trabajadores','personas.id','=','trabajadores.persona_id')
    ->where('personas.apellido_paterno','=','huaripata')
    ->first();dd($nombres);*/

   /* $nombres = Persona::with('trabajadores')
    ->where('personas.apellido_paterno','=','huaripata')
    ->get();dd($nombres);*/
    
    $this->authorize("VerUsuarios", User::class);

    $usuarios = User::where(
      "name",
      "LIKE",
      "%" . request("buscar") . "%"
    )->orderBy("id");

    return Inertia::render("Usuarios/UsuarioLista", [
      "usuarios" => $usuarios->paginate(10)->withQueryString(),
    ]);
  }


  public function importInstituciones(Request $request){
    //dd($request);
    $file = $request->file('documento')->store('temp');
    $path = storage_path('app').'/'.$file;
    Excel::import(new InstitucionesImport, $path);
    return back();
  }

  
  public function create()
  {
   // $nombres = Trabajadore::with('personas')->();
//dd($nombres);
    $this->authorize("CrearUsuarios", User::class);
    $Cargo = Maestro::where('nombreTabla', "Cargo")->get();//dd($Cargo);
    $Institucion = Instituciones::select("id","nombre","numero")->get();//dd($Institucion);
    
    $roles = Role::select("id", "name", "guard_name")
      ->with("permissions")
      ->orderBy("id")
      ->get();
      
    /*$nombres = Trabajadore::join('personas as p','p.id','=','trabajadores.persona_id')
    ->where('trabajadores.estado','=','1')
    //->select('*')->get();
    ->select('p.id',DB::raw('CONCAT(p.nombres," ",p.apellido_paterno," ",p.apellido_materno) as nombre'))->get();*/
    
    /*$nombres = Trabajadore::join('personas as p','p.id','=','trabajadores.persona_id')

    ->where('p.nombres', '=', 'miguel')
    ->select('*')->get();*/

    return Inertia::render("Usuarios/UsuariosInsertar", [
      "roles" => $roles,//"nombres"=>$nombres,
      "cargo" => $Cargo,
      "institucion" => $Institucion,
    ]);
  }


  public function store(Request $request)
  {
    //dd($request);
    $this->authorize("CrearUsuarios", new User());

    $request->validate([
      "name" => "Required|max:200",
      "email" => "Required|email|unique:users,email",
      "password" => "Required|confirmed|min:8|max:50",
      "password_confirmation" => "required|min:8|max:50",
      "rolId" => "Required",
      "Cargo" => "Required",
      "institucion" => "Required",
    ]);

    $usuario = new User();
    $usuario->name = $request->name;
    $usuario->email = $request->email;
    $usuario->password = bcrypt($request->password);
    $usuario->cargo=$request->Cargo;
    $usuario->idInstitucion=$request->institucion;
    $usuario->roles()->detach();
    $usuario->assignRole($request->rolId);
    $usuario->save();
    return Redirect::route("usuarios.index");
  }

  public function edit(User $usuario)
  {
    //dd($usuario);
    $this->authorize("EditarUsuarios", User::class);

    $user = User::where("id", $usuario->id)->with("roles")->first();

    $roles = Role::all();

    return Inertia::render("Usuarios/UsuarioEditar", ["usuarios" => $user, "roles" => $roles]);
  }

  public function update(Request $request, User $usuario)
  {
    //dd($request);
    $this->authorize("EditarUsuarios", $usuario);
    $request->validate([
      "name" => "Required|max:200",
      "email" => "Required|email|unique:users,email," . $usuario->id,
      "rolId" => "Required",
    ]);

    $usuario = User::find($request->id);
    $usuario->name = $request->name;
    $usuario->email = $request->email;

    if ($request->photo) {
      Storage::disk("public")->delete($usuario->profile_photo_path);
      $photo = $request->photo;
      $imageName = "profile-photos/" . Str::random(40) . "." . "png";
      Storage::disk("public")->put(
        $imageName,
        file_get_contents($photo->getPathName())
      );
      $usuario->profile_photo_path = $imageName;
    }

    $usuario->roles()->detach();
    $usuario->assignRole($request->rolId);
    $usuario->save();
    return redirect()->back();
  }

  public function eliminarFoto(Request $request)
  {
    $usuario = User::find($request->form["id"]);
    $this->authorize("EliminarUsuarios", $usuario);

    Storage::disk("public")->delete($usuario->profile_photo_path);
    $usuario->profile_photo_path = null;
    $usuario->save();
    return redirect()->back();
  }

  public function actualizarPassword(Request $request)
  {
 
    $reglas = [
      "form.password" => "Required|min:8|confirmed|max:50",
      "form.password_confirmation" => "required|min:8|max:50",
    ];

    $mensajes = [
      "form.password.required" => "El campo nueva contraseña es obligatorio.",
      "form.password.min" =>
      "nueva contraseña debe contener al menos :min caracteres.",
      "form.password.confirmed" =>
      "nueva contraseña y confirmar contraseña deben coincidir.",
      "form.password_confirmation.required" =>
      "El campo confirmar contraseña es obligatorio.",
      "form.password_confirmation.min" =>
      "confirmar contraseña debe contener al menos :min caracteres.",
    ];

    $this->validate($request, $reglas, $mensajes);
   
    $pass = $request->form;

    $usuario = User::find($pass['id']);
    $usuario->password = bcrypt($pass["password"]);
    $usuario->save();
    return redirect()->back();
  }

  public function destroy(User $usuario)
  {
    $user = User::findOrFail($usuario->id);
    $this->authorize("EliminarUsuarios", $user);
    $usuario->delete();
    return Redirect::route("usuarios.index");
  }
}
