<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvestigationResource;
use App\Models\Investigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class InvestigationController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Divulgation/Investigations/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'investigations' => InvestigationResource::collection(Investigation::paginate(6))
        ]);
    }
}
