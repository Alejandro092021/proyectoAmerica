<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
  public function index()
  {
    $this->authorize("VerPermisos", User::class);

    $permisos = Permission::where(
      "name",
      "LIKE",
      "%" . request("buscar") . "%"
    )->orderBy("id");
    return Inertia::render("Autorizacion/Permisos", [
      "permisos" => $permisos->paginate(10)->withQueryString(),
    ]);
  }
}
