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
