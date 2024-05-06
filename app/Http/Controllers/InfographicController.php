<?php

namespace App\Http\Controllers;

use App\Models\Infographic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class InfographicController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Innovation/Infographics/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'infographics' => Infographic::with('image')
                ->get()
                ->toArray(),
        ]);
    }

    public function show(Request $request): Response
    {
        return Inertia::render('Innovation/Infographics/Show', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'infographic' => Infographic::where('slug', $request->slug)
                ->first()
                ->toArray(),
        ]);
    }
}
