<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    // Affiche une contribution spécifique
    public function show($id)
    {
        // Récupérer la contribution spécifique avec son contributeur
        $contribution = Contribution::with('contributor')->findOrFail($id);

        // Passer la contribution à la vue
        return view('app.tracks.show', ['contribution' => $contribution]);
    }

    // Affiche toutes les contributions (si vous voulez lister toutes les contributions)
    public function index()
    {
        $contributions = Contribution::with('contributor')->get();
        
        return view('app.tracks.index', ['contributions' => $contributions]);
    }
}
