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
        $invitado1Role = Role::create(["name" => "invitado"]);

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

        //creamos el usuario admin y asignamos rol
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->password = bcrypt("123456789");
        $user->save();
        $user->assignRole($adminRole);

        //creamos el usuario invitado y asignamos rol
        $user = new User();
        $user->name = "Invitado";
        $user->email = "invitado@mail.com";
        $user->password = bcrypt("123456789");
        $user->save();
        $user->assignRole($invitado1Role);
    }
}
