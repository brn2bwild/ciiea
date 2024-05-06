<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class SocialServiceController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('Vinculation/SocialService', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register')
        ]);
    }
}
