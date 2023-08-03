<?php

namespace Database\Seeders;

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

		// create permissions
		Permission::create(['name' => 'ver publicaciones']);
		Permission::create(['name' => 'editar publicaciones']);
		Permission::create(['name' => 'eliminar publicaciones']);
		Permission::create(['name' => 'crear publicaciones']);

		// create roles and assign existing permissions
		$userRole = Role::create(['name' => 'user']);
		$userRole->givePermissionTo('ver publicaciones');

		$editorRole = Role::create(['name' => 'editor']);
		$editorRole->givePermissionTo('editar publicaciones');

		$adminRole = Role::create(['name' => 'admin']);
		$adminRole->givePermissionTo('editar publicaciones');
		$adminRole->givePermissionTo('eliminar publicaciones');
		$adminRole->givePermissionTo('crear publicaciones');

		$superAdminRole = Role::create(['name' => 'super admin']);
		// gets all permissions via Gate::before rule; see AuthServiceProvider

		// create demo users
		$user = \App\Models\User::factory()->create([
			'name' => 'Example User',
			'email' => 'user@example.com',
		]);
		$user->assignRole($userRole);

		$user = \App\Models\User::factory()->create([
			'name' => 'Example Editor',
			'email' => 'editor@example.com',
		]);
		$user->assignRole($editorRole);

		$user = \App\Models\User::factory()->create([
			'name' => 'Example Admin User',
			'email' => 'admin@example.com',
		]);
		$user->assignRole($adminRole);

		$user = \App\Models\User::factory()->create([
			'name' => 'Example Super-Admin User',
			'email' => 'superadmin@example.com',
		]);
		$user->assignRole($superAdminRole);
	}
}
