<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */

  //creamos politicas para los usuarios
  public function VerUsuarios(User $user)
  {
    return $user->hasPermissionTo("ver:usuario");
  }
  public function CrearUsuarios(User $user)
  {
    return $user->hasPermissionTo("crear:usuario");
  }

  public function EditarUsuarios(User $user)
  {
    return $user->hasPermissionTo("editar:usuario");
  }

  public function EliminarUsuarios(User $user)
  {
    return $user->hasPermissionTo("eliminar:usuario");
  }
  //creamos politicas para los Roles
  public function VerRoles(User $user)
  {
    return $user->hasPermissionTo("ver:rol");
  }
  //creamos politicas para los Permisos
  public function VerPermisos(User $user)
  {
    return $user->hasPermissionTo("ver:permiso");
  }
  
  //creamos politicas para saneamiento fisico legal
  public function VerSaneamientos(User $user)
  {
    return $user->hasPermissionTo("ver:saneamiento");
  }
  public function CrearSaneamientos(User $user)
  {
    return $user->hasPermissionTo("crear:saneamiento");
  }

  public function EditarSaneamientos(User $user)
  {
    return $user->hasPermissionTo("editar:saneamiento");
  }

  public function EliminarSaneamientos(User $user)
  {
    return $user->hasPermissionTo("eliminar:saneamiento");
  }

  
}
