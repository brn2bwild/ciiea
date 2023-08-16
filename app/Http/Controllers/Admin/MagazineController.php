<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MagazineController extends Controller
{
	public function index()
	{
		return Inertia::render('Admin/Magazines/Index', [
			'magazines' => Magazine::select(
				'id',
				'name',
				'publicated_at',
				'tags',
			)
				->get()
				->transform(fn ($magazine) => [
					"id" => $magazine->id,
					"name" => ucwords($magazine->name),
					"publicated_at" => date("d M Y", strtotime($magazine->publicated_at)),
					"tags" => $magazine->tags,
					// "tags"        => explode(',', strtoupper($magazine["tags"])),
					// "publicated_at" => $magazine->publicated_at,
				]),
		]);
	}
}
