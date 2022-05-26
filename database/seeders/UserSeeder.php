<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//agregamos los modelos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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


        //creamos el usuario admin y asignamos rol
        $user = new User();
        $user->nombres = "Admin";
        $user->apellidos = "Admin";
        $user->direccion = "Admin";
        $user->telefono = "Admin";
        $user->tipoDocumento = 1;
        $user->estadoCivil =2;
        $user->email = "admin@mail.com";
        $user->password = bcrypt("123456789");
        $user->save();
        $user->assignRole($adminRole);

        $user = new User();
        $user->nombres = "Admin";
        $user->apellidos = "Admin";
        $user->direccion = "Admin";
        $user->telefono = "Admin";
        $user->tipoDocumento = 1;
        $user->estadoCivil =2;
        $user->email = "admin@mailww.com";
        $user->password = bcrypt("123456789");
        $user->save();
        $user->assignRole($adminRole);

    }
}
