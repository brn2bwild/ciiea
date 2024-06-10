<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
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
            'events' => EventResource::collection(Event::paginate(10)),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function show(Request $request): Response
    {
        $event = Event::where('slug', $request->event)->first();

        return Inertia::render('Gallery/Details', [
            'event' => $event,
            'images' => $event->images,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
