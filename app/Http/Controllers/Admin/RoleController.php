<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
	public function index(): Response
	{
		
		return Inertia::render('Admin/Roles/Index', [
			'roles' => Role::get(),
			'permissions' => Permission::get()
		]);
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Roles/Edit', [
			'role' => Role::findById($request->id)
		]);
	}
}
