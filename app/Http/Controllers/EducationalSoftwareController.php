<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class EducationalSoftwareController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Innovation/Software/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'software_resources' => Software::with('image')
                ->get()
                ->toArray(),
        ]);
    }

    public function show(Request $request): Response
    {
        return Inertia::render('Innovation/Software/Show', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'software' => Software::where('slug', $request->slug)
                ->first()
                ->toArray(),
        ]);
    }
}
