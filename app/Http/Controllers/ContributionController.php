<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Contribution;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exceptions\RegistrationFailedException;

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

    public function showForm()
    {
        return view('app.tracks.create');
    }

     // Traite la soumission de contribution
     public function add(Request $request)
     {
         // Validation des données du formulaire
        $request->validate([
            'title' => ['required', 'max:255'],
            'artist' => ['required', 'max:255'],
            'url' => ['required', 'max:255'],   
        ]);

        DB::beginTransaction();

        try {
            // Instancier un nouvel objet Contribution
            $contribution = new Contribution();
            $contribution->title = $request->input('title');
            $contribution->name = $request->input('artist'); 
            $contribution->link = $request->input('url'); 
            $contribution->contributor_id = Auth::id(); 
            $contribution->image = 'default_image.jpg'; 
            $contribution->created_at = now();

            $contribution->save(); // Enregistrement dans la base de données

            DB::commit();
            return redirect()->route('contributions.show')->with('success', 'Contribution ajoutée avec succès !');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new RegistrationFailedException(previous: $th);
        }
 
        return back()->withErrors([
            'contribution' => 'Il y a une erreur, veuillez réessayer.',
        ])->onlyInput('contribution');
    }

    // Affiche toutes les contributions (si vous voulez lister toutes les contributions)
    public function index()
    {
        $contributions = Contribution::with('contributor')->get();
        
        return view('app.tracks.index', ['contributions' => $contributions]);
    }
}
