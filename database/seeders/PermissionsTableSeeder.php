<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();
        //ConfiguraçõesUsuários - OK
        Permission::create(['name' => 'Cadastrar Usuário','group' => 'Usuários']);
        Permission::create(['name' => 'Editar Usuário', 'group' => 'Usuários']);
        Permission::create(['name' => 'Excluir Usuário', 'group' => 'Usuários']);
        Permission::create(['name' => 'Listar Usuários', 'group' => 'Usuários']);
        Permission::create(['name' => 'Ativar/Desativar Usuário', 'group' => 'Usuários']);

        //Configurações-Perfis - OK
        Permission::create(['name' => 'Cadastrar Perfil de Usuário', 'group' => 'Perfis de Usuário']);
        Permission::create(['name' => 'Editar Perfil de Usuário', 'group' => 'Perfis de Usuário']);
        Permission::create(['name' => 'Excluir Perfil de Usuário', 'group' => 'Perfis de Usuário']);
        Permission::create(['name' => 'Listar Perfis de Usuário', 'group' => 'Perfis de Usuário']);
        Permission::create(['name' => 'Associar Permissões ao Perfil de Usuário', 'group' => 'Perfis de Usuário']);


        $role = Role::create(['name' => 'Super Admin']);
        $user = User::where('id',1)->first();
        $user->assignRole('Super Admin');

    }
}
