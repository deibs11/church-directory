<?php

namespace App\Http\Controllers;

use App\Models\Church;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
class ViewController extends Controller
{
    public function index()
{
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'authUser' => auth()->user(),
    ]);
}


    public function directory(){


        $churches = Church::all();

        // Obtener el pais de la iglesia
        $countries = Church::select('pais')->distinct()->pluck('pais');

        //Obtener iglesias por status
        $established = Church::where('status', 'Establecida')->get();
        $missions = Church::where('status', 'Misión')->get();
        $reform = Church::where('status', 'En Proceso')->get();

        return Inertia::render("Directorio", [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'authUser' => auth()->user(),

            // Ayuda para categorización y filtrado
            'churches'=> $churches,
            'established' => $established,
            'missions' => $missions,
            'reform' => $reform,
            'countries' => $countries,
        ]);
    }

    public function church($id)
{
    $church = Church::find($id);

    if (!$church) {
        abort(404);
    }

    return Inertia::render("Church", [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'authUser' => auth()->user(),
        'church' => $church,
    ]);
}
}
