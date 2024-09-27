<?php

namespace App\Http\Controllers;

use App\Models\InvitationCode;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function show()
    {
        $user = Auth::user();  

        if (!$user) {
            return redirect()->route('login'); 
        }

        $invitationCodes = InvitationCode::where('user_id', $user->id)->get();

        // Calculer le nombre de codes d'invitation non utilisés
        $remainingCodes = $invitationCodes->filter(function($code) {
            return !$code->is_used;
        })->count();

        // Passer les variables à la vue
        return view('app.profile', compact('invitationCodes', 'remainingCodes'));
    }

}