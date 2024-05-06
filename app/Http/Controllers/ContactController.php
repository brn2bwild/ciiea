<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Contact', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'administrators' => User::role('admin')->get()->toArray(),
        ]);
    }
}
