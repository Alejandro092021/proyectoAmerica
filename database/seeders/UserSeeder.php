<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//agregamos los modelos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//agregamos modelo institucion
use App\Models\Instituciones;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creamos los roles
        $adminRole = Role::create(["name" => "super admin"]);
        $invitado1Role = Role::create(["name" => "SGGP"]);

        //creamos los roles
        Permission::create(["name" => "ver:rol"])->assignRole($adminRole);
        Permission::create(["name" => "crear:rol"])->assignRole($adminRole);
        Permission::create(["name" => "editar:rol"])->assignRole($adminRole);
        Permission::create(["name" => "eliminar:rol"])->assignRole($adminRole);

        //creamos los permisos y lo asignamos al rol
        Permission::create(["name" => "ver:permiso"])->assignRole($adminRole);
        //creamos los permisos usuarios y asignamos  al role
        Permission::create(["name" => "ver:usuario"])->syncRoles($adminRole,$invitado1Role);

        Permission::create(["name" => "crear:usuario"])->assignRole($adminRole);
        Permission::create(["name" => "editar:usuario"])->assignRole($adminRole);
        Permission::create(["name" => "eliminar:usuario"])->assignRole($adminRole);

        //--------------------------------------------------------------------------------------

        //Creamos permisos a Saneamiento Fisico Legal

        Permission::create(["name" => "ver:saneamiento"])->assignRole($adminRole);
        Permission::create(["name" => "crear:saneamiento"])->assignRole($adminRole);
        Permission::create(["name" => "editar:saneamiento"])->assignRole($adminRole);
        Permission::create(["name" => "eliminar:saneamiento"])->assignRole($adminRole);

        //Creamos permisos a Cerco Perimetrico

        Permission::create(["name" => "ver:cerco"])->assignRole($adminRole);
        Permission::create(["name" => "crear:cerco"])->assignRole($adminRole);
        Permission::create(["name" => "editar:cerco"])->assignRole($adminRole);
        Permission::create(["name" => "eliminar:cerco"])->assignRole($adminRole);

        //Creamos permisos a Servicio

        Permission::create(["name" => "ver:servicio"])->assignRole($adminRole);
        Permission::create(["name" => "crear:servicio"])->assignRole($adminRole);
        Permission::create(["name" => "editar:servicio"])->assignRole($adminRole);
        Permission::create(["name" => "eliminar:servicio"])->assignRole($adminRole);

        //Creamos permisos a Matriculados

        Permission::create(["name" => "ver:matriculado"])->assignRole($adminRole);
        Permission::create(["name" => "crear:matriculado"])->assignRole($adminRole);
        Permission::create(["name" => "editar:matriculado"])->assignRole($adminRole);
        Permission::create(["name" => "eliminar:matriculado"])->assignRole($adminRole);

        //Creamos permisos a Asistencias

        Permission::create(["name" => "ver:asistencia"])->assignRole($adminRole);
        Permission::create(["name" => "crear:asistencia"])->assignRole($adminRole);
        Permission::create(["name" => "editar:asistencia"])->assignRole($adminRole);
        Permission::create(["name" => "eliminar:asistencia"])->assignRole($adminRole);

        //Creamos institucion Admin
        $InstitucionAdmin = new Instituciones();
        $InstitucionAdmin->nombre = "InstitucionAdmin";
        $InstitucionAdmin->numero = "numeroAdmin";
        $InstitucionAdmin->direccion = "DireccionAdmin";
        $InstitucionAdmin->tipoZona = "1";
        $InstitucionAdmin->tipoModalidad = "1";
        $InstitucionAdmin->distrito = "DistritoAdmin";
        $InstitucionAdmin->tieneSfl = "1";
        $InstitucionAdmin->tipoNombreSfl = "1";
        $InstitucionAdmin->tieneDocumentoSfl = "1";
        $InstitucionAdmin->tieneProcesoSfl = "1";
        $InstitucionAdmin->tipoProcesoSfl = "1";
        $InstitucionAdmin->tieneCerco = "1";
        $InstitucionAdmin->tipoCerco = "1";
        $InstitucionAdmin->estadoCerco = "1";
        $InstitucionAdmin->requiereRecreacion = "1";
        $InstitucionAdmin->tipoRecreacion = "1";
        $InstitucionAdmin->tieneIntenet = "1";
        $InstitucionAdmin->tipoIntenet = "1";

        $InstitucionAdmin->cancelaIntenet = "1";
        $InstitucionAdmin->estadoIntenet = "1";
        $InstitucionAdmin->tieneLuz = "1";
        $InstitucionAdmin->tipoLuz = "1";
        $InstitucionAdmin->cancelaLuz = "1";
        $InstitucionAdmin->estadoLuz = "1";
        $InstitucionAdmin->tieneAgua = "1";
        $InstitucionAdmin->tipoAgua = "1";
        $InstitucionAdmin->cancelaAgua = "1";
        $InstitucionAdmin->estadoAgua = "1";

        $InstitucionAdmin->tieneDesague = "1";
        $InstitucionAdmin->tipoDesague = "1";
        $InstitucionAdmin->cancelaDesague = "1";
        $InstitucionAdmin->estadoDesague = "1";
        $InstitucionAdmin->tieneReserva = "1";
        $InstitucionAdmin->tipoReserva = "1";
        $InstitucionAdmin->cancelaReserva = "1";
        $InstitucionAdmin->estadoReserva = "1";
        $InstitucionAdmin->tieneVigilancia = "1";
        $InstitucionAdmin->tipoVigilancia = "1";
        $InstitucionAdmin->cancelaVigilancia = "1";
        $InstitucionAdmin->estadoVigilancia = "1";
        //$InstitucionAdmin->save();

        //Institucion Invitado
        $InstitucionInvitado = new Instituciones();
        $InstitucionInvitado->nombre = "InstitucionInvitado";
        $InstitucionInvitado->numero = "numeroInvitado";
        $InstitucionInvitado->direccion = "DireccionInvitado";
        $InstitucionInvitado->tipoZona = "1";
        $InstitucionInvitado->tipoModalidad = "1";
        $InstitucionInvitado->distrito = "DistritoInvitado";
        $InstitucionInvitado->tieneSfl = "1";
        $InstitucionInvitado->tipoNombreSfl = "1";
        $InstitucionInvitado->tieneDocumentoSfl = "1";
        $InstitucionInvitado->tieneProcesoSfl = "1";
        $InstitucionInvitado->tipoProcesoSfl = "1";
        $InstitucionInvitado->tieneCerco = "1";
        $InstitucionInvitado->tipoCerco = "1";
        $InstitucionInvitado->estadoCerco = "1";
        $InstitucionInvitado->requiereRecreacion = "1";
        $InstitucionInvitado->tipoRecreacion = "1";
        $InstitucionInvitado->tieneIntenet = "1";
        $InstitucionInvitado->tipoIntenet = "1";

        $InstitucionInvitado->cancelaIntenet = "1";
        $InstitucionInvitado->estadoIntenet = "1";
        $InstitucionInvitado->tieneLuz = "1";
        $InstitucionInvitado->tipoLuz = "1";
        $InstitucionInvitado->cancelaLuz = "1";
        $InstitucionInvitado->estadoLuz = "1";
        $InstitucionInvitado->tieneAgua = "1";
        $InstitucionInvitado->tipoAgua = "1";
        $InstitucionInvitado->cancelaAgua = "1";
        $InstitucionInvitado->estadoAgua = "1";

        $InstitucionInvitado->tieneDesague = "1";
        $InstitucionInvitado->tipoDesague = "1";
        $InstitucionInvitado->cancelaDesague = "1";
        $InstitucionInvitado->estadoDesague = "1";
        $InstitucionInvitado->tieneReserva = "1";
        $InstitucionInvitado->tipoReserva = "1";
        $InstitucionInvitado->cancelaReserva = "1";
        $InstitucionInvitado->estadoReserva = "1";
        $InstitucionInvitado->tieneVigilancia = "1";
        $InstitucionInvitado->tipoVigilancia = "1";
        $InstitucionInvitado->cancelaVigilancia = "1";
        $InstitucionInvitado->estadoVigilancia = "1";
        //$InstitucionInvitado->save();




        //creamos el usuario admin y asignamos rol
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt("123456789");
        $user->Cargo="1";
        //$user->idInstitucion=$InstitucionAdmin->id;
        $user->save();
        $user->assignRole($adminRole);

        //creamos el usuario invitado y asignamos rol
        $user = new User();
        $user->name = "SGGP";
        $user->email = "sggp@mail.com";
        $user->Cargo="1";
        $user->password = bcrypt("123456789");
        //$user->idInstitucion=$InstitucionInvitado->id;
        $user->save();
        $user->assignRole($invitado1Role);
    }
}
