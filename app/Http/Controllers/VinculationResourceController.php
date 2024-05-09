<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class VinculationResourceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Vinculation/Resources', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'resources' => Resource::with('file')
                ->paginate(6)
                // ->each(function ($resource, $index) {
                //     $resource->created_at_for_humans = $resource->created_at->diffForHumans();
                // })
                // ->toArray(),
        ]);
    }
}
