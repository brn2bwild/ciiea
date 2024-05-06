<?php

namespace App\Http\Controllers;

use App\Models\Convocation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class ConvocationController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Convocations/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'convocations' => Convocation::with('image')
                ->get()
                ->each(function ($convocation, $index) {
                    $date_time = Carbon::create($convocation->date_time);
                    $convocation->date = $date_time->isoFormat('LL');
                    $convocation->time = $date_time->isoFormat('h:mm');
                    $convocation->created_at_for_humans = $convocation->created_at->diffForHumans();
                })
                ->toArray(),
        ]);
    }

    public function show(Request $request): Response
    {
        $convocation = Convocation::where('slug', $request->slug)->first()->toArray();

        $date_time = Carbon::createFromDate($convocation['date_time']);

        $convocation['date'] = $date_time->isoFormat('LL');

        $convocation['time'] = $date_time->format('g:i a');

        return Inertia::render('Convocations/Show', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'convocation' => $convocation,
        ]);
    }
}
