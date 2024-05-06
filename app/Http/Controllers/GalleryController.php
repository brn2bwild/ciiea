<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class GalleryController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Gallery/Index', [
            'events' => Event::with('images')->get(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function show(Request $request): Response
    {
        $event = Event::where('id', $request->event)->first();

        $images = $event->images;

        return Inertia::render('Gallery/Details', [
            'images' => $images,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
