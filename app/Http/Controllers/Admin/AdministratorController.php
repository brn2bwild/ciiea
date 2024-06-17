<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadSingleImageRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Role;

class AdministratorController extends Controller
{
	public function index(): Response
	{
		return Inertia::render('Admin/Administrators/Index', [
			'administrators' => User::with('image')->role(['admin', 'editor'])->paginate(10),
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
			'social_media' => [
				'twitter' => null,
				'facebook' => null,
				'linkedin' => null,
			]
		]);

		$user->assignRole('admin');

		return back()->with('success', '');
	}

	public function edit(Request $request): Response
	{
		return Inertia::render('Admin/Administrators/Edit', [
			'administrator' => User::with('roles')->with('image')->where('id', $request->id)->role(['admin', 'editor'])->first(),
			'roles' => Role::whereNot('name', 'super admin')->get(),
		]);
	}

	public function update(Request $request): RedirectResponse
	{
		//falta agregar la autorización

		//falta agregar la validación

		$user = User::where('id', $request->id)->firstOrFail();
		
		$user->update([
			'name' => $request->name,
			'email' => $request->email,
			'mobile' => $request->mobile,
			'short_description' => $request->short_description,
			'long_description' => $request->long_description,
			'is_admin_contact' => $request->is_contact
		]);

		$user->syncRoles($request->role);

		return back()->with('success', '');
	}

	public function destroy(Request $request): RedirectResponse
	{
		User::findOrFail($request->id)->delete();

		return back()->with('success', '');
	}

	public function uploadImage(UploadSingleImageRequest $request): RedirectResponse
	{
		$user = User::findOrFail($request->input('id'));

		$user->setProfileImage($request);

		return Redirect::route('admin.administrators.edit', $request->input('id'));
	}

	public function deleteImage(Request $request): RedirectResponse
	{
		$user = User::findOrFail($request->input('id'));

		$user->detachImage();

		return Redirect::back();
	}
}
