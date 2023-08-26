<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
	public function show(Request $request)
	{
		$content = Storage::get('public/files/'.$request->file);

		return Response::make($content, 200, [
			'Content-Type' => 'application/pdf',
			'Content-Disposition' => 'inline; filename="' . $request->file . '"'
		]);
	}
}
