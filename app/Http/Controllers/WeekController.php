<?php

namespace App\Http\Controllers;

use App\Models\Week;
use App\Models\Contribution;
use Carbon\Carbon;

class WeekController extends Controller
{
    /**
     * Redirect to current week.
     */
    public function index()
    {
        return redirect()->route('weeks.show', [
            'week' => Week::current()
        ]);
    }

    /**
     * Show the given week.
     */
    public function show(Week $week)
    {
        $weekStart = Carbon::parse($week->week_starts_at);
        $weekEnd = Carbon::parse($week->week_ends_at);

        // Récupérer les contributions ajoutées durant cette période
        $contributions = Contribution::whereBetween('created_at', [$weekStart, $weekEnd])->get();

        return view('app.weeks.show', [
            'week' => $week,
            'tracks' => $contributions, 
            'isCurrent' => $week->toPeriod()->contains(now()),
        ]);
    }
}
