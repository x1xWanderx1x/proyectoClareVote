<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Muestra la vista del dashboard
    public function index()
    {
        // Obtiene información del usuario autenticado (opcional)
        $user = Auth::user();

        // Retorna la vista del dashboard
        return view('components.index', compact('user'));
    }
}

