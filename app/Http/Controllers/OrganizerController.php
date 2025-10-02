<?php

namespace App\Http\Controllers;

use App\Models\User;

class OrganizerController extends Controller
{
    public function index()
    {
        // Hosts = Users mit role=host
        $hosts = User::hosts()
            ->withCount([
                'eventsHosted as events_count',
            ])
            ->paginate(12);

        return view('organizers.index', compact('hosts'));
    }

    public function show(User $user) // route-model-binding: /organizers/{user}
    {
        abort_unless($user->isHost(), 404);

        $host = $user->load([
            'eventsHosted' => function ($q) {
                $q->withAvg('reviews as average_rating', 'rating')
                  ->withCount('reviews'); // reviews of each event
            }
        ]);

        return view('organizers.show', compact('host'));
    }
}
