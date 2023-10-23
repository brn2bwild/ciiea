<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;

class AdministratorController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Administrators/Index', [
			'administrators' => User::role('admin')->get(),
		]);
	}

	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:' . User::class,
			'password' => ['required', 'confirmed', Password::defaults()],
		]);

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);

		$user->assignRole('admin');
		
		return back()->with('success', '');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Administrators/Edit', [
			'administrator' => User::where('id', $request->id)->role('admin')->first(),
		]);
	}

	public function update(Request $request): RedirectResponse
	{
		User::where('id', $request->id)->update([
			'name' => $request->name,
			'email' => $request->email
		]);

		return back()->with('success', '');
	}
}
