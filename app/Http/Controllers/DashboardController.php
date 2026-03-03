<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\WorkoutSession;
use App\Models\Activity;

class DashboardController extends Controller
{
    public function index()
    {
        // Dados simulados - depois substituir por dados reais do banco
        $data = [
            'totalClients' => 42,
            'activeSessions' => 128,
            'avgCompletion' => 94.2,
            'todaySessions' => [
                [
                    'time' => '08:00 AM',
                    'client' => 'Sarah Jenkins',
                    'title' => 'Morning HIIT Session',
                    'status' => 'start'
                ],
                [
                    'time' => '10:30 AM',
                    'client' => 'Mike Ross',
                    'title' => 'Strength Assessment',
                    'status' => 'upcoming'
                ],
                [
                    'time' => '02:00 PM',
                    'client' => 'Emma Watts',
                    'title' => 'Mobility & Flow',
                    'status' => 'upcoming'
                ]
            ],
            'newClients' => [
                [
                    'name' => 'Jessica Lee',
                    'message' => 'New Inquiry: Fat Loss Plan',
                    'avatar' => 'https://example.com/avatar1.jpg'
                ],
                [
                    'name' => 'David Chen',
                    'message' => 'Awaiting Onboarding',
                    'avatar' => 'https://example.com/avatar2.jpg'
                ]
            ],
            'activities' => [
                [
                    'client' => 'Alex Morgan',
                    'activity' => 'completed Chest Day B workout',
                    'time' => '2 hours ago',
                    'status' => 'completed'
                ],
                [
                    'client' => 'Sarah Jenkins',
                    'activity' => 'reached a new PB in Deadlift (120kg)',
                    'time' => '5 hours ago',
                    'status' => 'completed'
                ],
                [
                    'client' => 'Chris Evans',
                    'activity' => 'updated nutrition log',
                    'time' => 'Yesterday',
                    'status' => 'pending'
                ]
            ]
        ];

        return view('trainer.dashboard', $data);
    }
}