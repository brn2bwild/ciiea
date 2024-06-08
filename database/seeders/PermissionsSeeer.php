<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeer extends Seeder
{
	public function run(): void
	{
		// Reset cached roles and permissions
		app()[PermissionRegistrar::class]->forgetCachedPermissions();

		// create resource permissions
		Permission::create(['name' => 'ver recursos']);
		Permission::create(['name' => 'crear recursos']);
		Permission::create(['name' => 'editar recursos']);
		Permission::create(['name' => 'eliminar recursos']);

		// create users permissions
		Permission::create(['name' => 'ver usuarios']);
		Permission::create(['name' => 'editar usuarios']);
		Permission::create(['name' => 'eliminar usuarios']);

		// create publications permissions
		Permission::create(['name' => 'ver publicaciones']);
		Permission::create(['name' => 'crear publicaciones']);
		Permission::create(['name' => 'editar publicaciones']);
		Permission::create(['name' => 'eliminar publicaciones']);

		// create admin-users permissions
		Permission::create(['name' => 'ver administradores']);
		Permission::create(['name' => 'crear administradores']);
		Permission::create(['name' => 'editar administradores']);
		Permission::create(['name' => 'eliminar administradores']);

		// create roles and assign existing permissions
		$userRole = Role::create(['name' => 'user']);
		$userRole->givePermissionTo('ver recursos');
		$userRole->givePermissionTo('ver publicaciones');
		$userRole->givePermissionTo('crear publicaciones');
		$userRole->givePermissionTo('editar publicaciones');
		$userRole->givePermissionTo('eliminar publicaciones');

		$editorRole = Role::create(['name' => 'editor']);
		$editorRole->givePermissionTo('ver recursos');
		$editorRole->givePermissionTo('crear recursos');
		$editorRole->givePermissionTo('editar recursos');
		$editorRole->givePermissionTo('eliminar recursos');
		$editorRole->givePermissionTo('ver publicaciones');
		$editorRole->givePermissionTo('crear publicaciones');
		$editorRole->givePermissionTo('editar publicaciones');
		$editorRole->givePermissionTo('eliminar publicaciones');

		$adminRole = Role::create(['name' => 'admin']);
		$adminRole->givePermissionTo('ver recursos');
		$adminRole->givePermissionTo('crear recursos');
		$adminRole->givePermissionTo('editar recursos');
		$adminRole->givePermissionTo('eliminar recursos');
		$adminRole->givePermissionTo('ver usuarios');
		$adminRole->givePermissionTo('editar usuarios');
		$adminRole->givePermissionTo('eliminar usuarios');
		$adminRole->givePermissionTo('ver publicaciones');
		$adminRole->givePermissionTo('crear publicaciones');
		$adminRole->givePermissionTo('editar publicaciones');
		$adminRole->givePermissionTo('eliminar publicaciones');
		$adminRole->givePermissionTo('ver administradores');
		$adminRole->givePermissionTo('crear administradores');
		$adminRole->givePermissionTo('editar administradores');
		$adminRole->givePermissionTo('eliminar administradores');

		// gets all permissions via Gate::before rule; see AuthServiceProvider
		$superAdminRole = Role::create(['name' => 'super admin']);

		// create system users
		$user = User::factory()->create([
			'name' => 'Example User',
			'email' => 'user@example.com',
		]);
		$user->assignRole($userRole);

		$editor = User::factory()->create([
			'name' => 'Example Editor',
			'email' => 'editor@example.com',
			'is_admin_contact' => true
		]);
		$editor->assignRole($editorRole);

		$admin = User::factory()->create([
			'name' => 'Example Admin User',
			'email' => 'admin@example.com',
			'is_admin_contact' => true
		]);
		$admin->assignRole($adminRole);

		$super_admin = User::factory()->create([
			'name' => 'Example Super-Admin User',
			'email' => 'superadmin@example.com',
			'is_admin_contact' => true
		]);
		$super_admin->assignRole($superAdminRole);
	}
}
