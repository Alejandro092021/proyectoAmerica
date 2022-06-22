<?php

namespace App\Http\Controllers;

use App\Imports\InstitucionesImport;
use App\Models\Persona;
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
    
    $file = $request->DocumentoExcel;//dd($file);
   //$Instituciones = Instituciones::select('numero')->get();//dd($Instituciones);
   

     Excel::import(new InstitucionesImport, $file);
    return Redirect::route('usuarios.create');

    
   
  }

  
  public function create()
  {
   // $nombres = Trabajadore::with('personas')->();
//dd($nombres);
    $this->authorize("CrearUsuarios", User::class);
    $Cargo = Maestro::where('nombreTabla', "Cargo")->get();//dd($Cargo);
    $Institucion = Instituciones::select("id","nombre","codigoLocal")->get();//dd($Institucion);
    
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
      "nombres" => "required|max:200",
      "apellidopaterno" => "required|max:200",
      "apellidomaterno" => "required|max:200",
      "telefono" => "required|max:9",
    
      "email" => "Required|email|unique:users,email",
      "password" => "Required|confirmed|min:8|max:50",
      "password_confirmation" => "required|min:8|max:50",
      "rolId" => "Required",
      "Cargo" => "Required",
      "institucion" => "Required|unique:users,idInstitucion",
    ]);


    $persona = new Persona();
    $persona->nombres = $request->nombres;//dd($request->nombres);
    $persona->apellidoPaterno = $request->apellidopaterno;
    $persona->apellidoMaterno = $request->apellidomaterno;
    $persona->correo = $request->email;
    $persona->telefono = $request->telefono;
    $persona->save();

    $primeraLetra = Str::substr($request->nombres, 0, 1);//dd($primeraLetra);
    $apellido= $request->apellidopaterno;
    $primeraLetraMaterno = Str::substr($request->apellidomaterno, 0, 1);
    $sobrenombre = $primeraLetra . $apellido . $primeraLetraMaterno;//dd($sobrenombre);

    $usuario = new User();
    $usuario->name = $sobrenombre;//dd($usuario->name);
    $usuario->email = $request->email;
    $usuario->password = bcrypt($request->password);
    $usuario->cargo=$request->Cargo;

    $usuario->idInstitucion=$request->institucion;
    $usuario->idPersona= $persona->id;
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
    $persona = Persona::where("id", $usuario->idPersona)->first();

    $roles = Role::all();

    return Inertia::render("Usuarios/UsuarioEditar", ["usuarios" => $user, "roles" => $roles, "persona" => $persona]);
  }

  public function update(Request $request, User $usuario)
  {
    //dd($request);
    $this->authorize("EditarUsuarios", $usuario);
    $request->validate([
      "nombres" => "Required|max:200",
      "apellidopaterno" => "required|max:200",
      "apellidomaterno" => "required|max:200",
      "telefono" => "required|max:9",

      "name" => "Required|max:200",
      "email" => "Required|email|unique:users,email," . $usuario->id,
      "rolId" => "Required",

      //"Cargo" => "Required",
      //"institucion" => "Required|unique:users,idInstitucion",
    ]);

    $persona = Persona::find($request->id);//dd($persona);
    $persona->nombres = $request->nombres;//dd($request->nombres);
    $persona->apellidoPaterno = $request->apellidopaterno;
    $persona->apellidoMaterno = $request->apellidomaterno;
    $persona->telefono = $request->telefono;
    $persona->correo = $request->email;
    $persona->save();//dd($persona);

    $primeraLetra = Str::substr($request->nombres, 0, 1);//dd($primeraLetra);
    $apellido= $request->apellidopaterno;
    $primeraLetraMaterno = Str::substr($request->apellidomaterno, 0, 1);
    $sobrenombre = $primeraLetra . $apellido . $primeraLetraMaterno;//dd($sobrenombre);


    $usuario = User::find($request->id);
    $usuario->name = $sobrenombre;//dd($usuario->name);
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
    return Redirect::route("usuarios.index");
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
    //dd($usuario);
    $user = User::findOrFail($usuario->id);//dd($user);
    $this->authorize("EliminarUsuarios", $user);
    if ($user->estado == 'Activado') {
      $user->estado = 0;
  } else {
      $user->estado = 1;
  }
    $user->update();
    return Redirect::route("usuarios.index");
  }

  public function show(User $usuario)
    {
        //
        //dd($usuario);

        $usuario = User::join('personas', 'personas.id', '=', 'users.idPersona')
        ->join('maestros','maestros.valor','=','users.Cargo')
        ->where('maestros.nombreTabla','=','Cargo')
            ->where('users.id', '=', $usuario->id)
            ->select('*')
            ->get();//dd($usuario);

        

        return Inertia::render('Usuarios/UsuarioVerDetalle', ["Usuario" => $usuario]);
    }
}
