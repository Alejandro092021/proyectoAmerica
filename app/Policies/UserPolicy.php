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

  //creamos politicas para cerco perimetrico
  public function VerCerco(User $user)
  {
    return $user->hasPermissionTo("ver:cerco");
  }
  public function CrearCerco(User $user)
  {
    return $user->hasPermissionTo("crear:cerco");
  }

  public function EditarCerco(User $user)
  {
    return $user->hasPermissionTo("editar:cerco");
  }

  public function EliminarCerco(User $user)
  {
    return $user->hasPermissionTo("eliminar:cerco");
  }

  //creamos politicas para servicio
  public function VerServicio(User $user)
  {
    return $user->hasPermissionTo("ver:servicio");
  }
  public function CrearServicio(User $user)
  {
    return $user->hasPermissionTo("crear:servicio");
  }

  public function EditarServicio(User $user)
  {
    return $user->hasPermissionTo("editar:servicio");
  }

  public function EliminarServicio(User $user)
  {
    return $user->hasPermissionTo("eliminar:servicio");
  }

  //creamos politicas para matriculado
  public function VerMatriculado(User $user)
  {
    return $user->hasPermissionTo("ver:matriculado");
  }
  public function CrearMatriculado(User $user)
  {
    return $user->hasPermissionTo("crear:matriculado");
  }

  public function EditarMatriculado(User $user)
  {
    return $user->hasPermissionTo("editar:matriculado");
  }

  public function EliminarMatriculado(User $user)
  {
    return $user->hasPermissionTo("eliminar:matriculado");
  }
  
  //creamos politicas para asistencias
  public function VerAsistencia(User $user)
  {
    return $user->hasPermissionTo("ver:asistencia");
  }
  public function CrearAsistencia(User $user)
  {
    return $user->hasPermissionTo("crear:asistencia");
  }

  public function EditarAsistencia(User $user)
  {
    return $user->hasPermissionTo("editar:asistencia");
  }

  public function EliminarAsistencia(User $user)
  {
    return $user->hasPermissionTo("eliminar:asistencia");
  }
}
