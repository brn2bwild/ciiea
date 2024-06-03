<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublicationResource;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class PublicationController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Divulgation/Publications/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'publications' => PublicationResource::collection(Publication::paginate(6))
        ]);
    }
}
