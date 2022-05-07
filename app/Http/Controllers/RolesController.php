<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
class RolesController extends Controller
{
  public function index()
  {

    $this->authorize("VerRoles", User::class);

    $roles = Role::with("permissions")
      ->where("name", "LIKE", "%" . request("buscar") . "%")
      ->orderBy("id");

    $permissions = Permission::select("id", "name")->orderBy("name");;

    return Inertia::render("Autorizacion/RolesLista", [
      "roles" => $roles->paginate(10)->withQueryString(),
      "permissions" => $permissions,
    ]);
  }

  public function create()
  {
    $roles = Role::select("id", "name", "guard_name")
      ->with("permissions")
      ->orderBy("id")
      ->get();

    $permissions = Permission::select("id", "name")->get();

    return Inertia::render("Autorizacion/RolesInsertar", [
      "roles" => $roles,
      "permissions" => $permissions,
    ]);
  }

  public function buscarNombres($rolusuario){
    $nombres = User::with('roles')
    ->where('name','LIKE',"%".$rolusuario."%")
    //->select('*')
    ->get();//dd($nombres);

    return response()->json($nombres);
  }

  public function store(Request $request)
  {
    $request->validate([
      "name" => "Required|max:200|unique:roles,name",
    ]);

    $rol = Role::create([
      "name" => $request->name,
      "guard_name" => "web",
    ]);
    if ($request->has("permissions")) {
      $rol->givePermissionTo($request->permissions);
    }

  
    return Redirect::route("roles.index");
  }

  public function edit(Role $role)
  {
    $roles = Role::where("id", $role->id)
      ->with("permissions")
      ->first();
    $permissions = Permission::all();

    return Inertia::render("Autorizacion/RolesEditar", [
      "roles" => $roles,
      "permissions" => $permissions,
    ]);
  }

  public function update(Request $request, Role $rol)
  {

    $request->validate([
      "name" => "Required|max:200|unique:roles,name," . $request->id,
    ]);

    $rol = Role::findOrFail($request->id);
    $rol->update(["name" => $request->name]);
    $rol->permissions()->detach();
    foreach ($request->Permisos as $p) {
      if ($p["checked"] == true) {
        $rol->givePermissionTo($p["id"]);
      }
    }
  
    return Redirect::route("roles.index");
  }

  public function destroy(Role $role)
  {
    $role->delete();
    return Redirect::route("roles.index");
  }
}
