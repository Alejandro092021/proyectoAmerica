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
use App\Models\Persona;

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
        $InstitucionAdmin->codigoModular = "ModularA";
        $InstitucionAdmin->codigoLocal = "LocalA";
        $InstitucionAdmin->provincia = "ProvinciaAdmin";
        $InstitucionAdmin->distrito = "DistritoAdmin";
        $InstitucionAdmin->direccion = "DireccionAdmin";
        $InstitucionAdmin->tipoZona = "1";
        $InstitucionAdmin->Modalidad = "1";
        $InstitucionAdmin->save();

        //Institucion Invitado
        $InstitucionInvitado = new Instituciones();
        $InstitucionInvitado->nombre = "InstitucionInvitado";
        $InstitucionInvitado->codigoModular = "ModularI";
        $InstitucionInvitado->codigoLocal = "LocalI";
        $InstitucionInvitado->provincia = "ProvinciaInvitado";
        $InstitucionInvitado->distrito = "DistritoInvitado";
        $InstitucionInvitado->direccion = "DireccionInvitado";
        $InstitucionInvitado->tipoZona = "1";
        $InstitucionInvitado->Modalidad = "1";
        $InstitucionInvitado->save();

        //Creamos persona Admin
        $PersonaAdmin = new Persona();
        $PersonaAdmin->nombres = "nombreAdmin";
        $PersonaAdmin->apellidoPaterno = "apellidoPatAdmin";
        $PersonaAdmin->apellidoMaterno = "apellidoMatAdmin";
        $PersonaAdmin->correo = "correoAdmin";
        $PersonaAdmin->telefono = "telefonoAdmin";
        $PersonaAdmin->save();

        //Creamos persona Invitado
        $PersonaInvitado = new Persona();
        $PersonaInvitado->nombres = "nombreInvitado";
        $PersonaInvitado->apellidoPaterno = "apellidoPatInvitado";
        $PersonaInvitado->apellidoMaterno = "apellidoMatAdmin";
        $PersonaInvitado->correo = "correoInvitado";
        $PersonaInvitado->telefono = "telefonoInvitado";
        $PersonaInvitado->save();



        //creamos el usuario admin y asignamos rol
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt("123456789");
        $user->Cargo="1";
        $user->idInstitucion=$InstitucionAdmin->id;
        $user->idPersona=$PersonaAdmin->id;
        $user->save();
        $user->assignRole($adminRole);

        //creamos el usuario invitado y asignamos rol
        $user = new User();
        $user->name = "SGGP";
        $user->email = "sggp@mail.com";
        $user->Cargo="1";
        $user->password = bcrypt("123456789");
        $user->idInstitucion=$InstitucionInvitado->id;
        $user->idPersona=$PersonaInvitado->id;
        $user->save();
        $user->assignRole($invitado1Role);
    }
}
