<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Eliminar todos los registros en `permissions` y `roles` y sus relaciones
        Permission::query()->delete();
        Role::query()->delete();
        \DB::table('model_has_permissions')->delete();
        \DB::table('model_has_roles')->delete();

        // Crear roles
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Supervisor']);
        $role3 = Role::create(['name' => 'Cajero']);

        // Crear y asignar permisos
        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'ver-estadistica'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'ver-configuracion'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'editar-configuracion'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'ver-entradas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'crear-entradas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'editar-entradas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'borrar-entradas'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'ver-salidas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'crear-salidas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'editar-salidas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'borrar-salidas'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'ver-gastos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear-gastos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'editar-gastos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'borrar-gastos'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'ver-usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear-usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar-usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'borrar-usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver-roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear-roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar-roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'borrar-roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'ver-permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear-permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar-permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'borrar-permisos'])->syncRoles([$role1]);

    }
}