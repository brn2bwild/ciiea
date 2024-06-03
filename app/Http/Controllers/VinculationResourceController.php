<?php

namespace App\Http\Controllers;

use App\Http\Resources\VinculationDocumentResource;
use App\Models\VinculationDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class VinculationResourceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Vinculation/Documents', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'resources' => VinculationDocumentResource::collection(VinculationDocument::paginate(6))
        ]);
    }
}
