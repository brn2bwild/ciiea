<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadSingleImageRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
	public function index(): Response
	{
		return Inertia::render("Admin/Users/Index", [
			"users" => User::with('image')->role('user')->paginate(10),
		]);
	}

	public function edit(Request $request): Response
	{
		return Inertia::render("Admin/Users/Edit", [
			"user" => User::with('image')->where('id', $request->id)->first(),
		]);
	}

	public function uploadImage(UploadSingleImageRequest $request): RedirectResponse
	{
		$user = User::findOrFail($request->input('id'));

		$user->setProfileImage($request);

		return Redirect::route('admin.users.edit', $request->input('id'));
	}

	public function deleteImage(Request $request): RedirectResponse
	{
		$user = User::findOrFail($request->input('id'));

		$user->detachImage();

		return Redirect::back();
	}
}
