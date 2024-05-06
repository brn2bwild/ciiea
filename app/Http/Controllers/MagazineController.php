<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class MagazineController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Divulgation/Magazines/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'magazines' => Magazine::with('file')
                ->select('id', 'name', 'publicated_at', 'slug')
                ->get()
                ->toArray(),
        ]);
    }
}
