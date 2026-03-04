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

    public function trainer()
    {
        // Dados do treinador
        $trainer = (object) [
            'name' => 'Marcus',
            'full_name' => 'Coach Marcus',
            'avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCwh7GTt9d5Ra0lbx_g2Rs1XpOO3QN5ODh15Id1cL-h1VLvVq_00-aaPT5ixOu4zEFAtNao_iIxF2FwRnM3I2_J-4NDz2oxFMwbyTEEeEth0YwD1vjQUD0TETTI0pjtypECA3e_lfwc1YGgaoCJGbjGQskOUcQE5M9n_ceS5myDiI4Y3SjiYz7v-Xv6mqDdPzV46GSVk8ozcXT6DBZkGIZB1n-QkGKyiviAWsh084S8LSvLVdwyYMjBx9AiG1w2FB9foUxBk8Po0pAa',
            'sessions_today' => 4
        ];

        // Métricas do dashboard
        $metrics = (object) [
            'total_clients' => 42,
            'new_clients_month' => 4,
            'active_sessions' => 128,
            'sessions_trend' => -2,
            'avg_completion' => 94.2,
            'total_kcal_burned' => 42000,
            'kcal_text' => '42,000'
        ];

        // Agenda de hoje
        $todaySchedule = [
            (object) [
                'id' => 1,
                'title' => 'Morning HIIT Session',
                'client_name' => 'Sarah Jenkins',
                'time' => '08:00 AM',
                'icon' => 'timer',
                'status' => 'start',
                'is_disabled' => false
            ],
            (object) [
                'id' => 2,
                'title' => 'Strength Assessment',
                'client_name' => 'Mike Ross',
                'time' => '10:30 AM',
                'icon' => 'event_note',
                'status' => 'upcoming',
                'is_disabled' => true
            ],
            (object) [
                'id' => 3,
                'title' => 'Mobility & Flow',
                'client_name' => 'Emma Watts',
                'time' => '02:00 PM',
                'icon' => 'self_improvement',
                'status' => 'upcoming',
                'is_disabled' => true
            ]
        ];

        // Alertas de novos clientes
        $newClientAlerts = [
            (object) [
                'id' => 1,
                'name' => 'Jessica Lee',
                'message' => 'New Inquiry: Fat Loss Plan',
                'avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7HPW7XX39h4BBtI-PoP8Sm9jeylToq2O-uWLknRLFaWFiPWJ9Cbj_hQisOo_ZhkJ8Cj7fHOS_H7U0u1VtNggsg8cnbQgyuoxjB_07Ok1Jiv_9gHl6srM-XjSJtqlMJ_jJaUvTbdZnliuLfydoR7GdjV6R6sMHChFvwoWj2JkxJr-tGvB8x_HPCKKAeyJq954WJ76-8QSNmixDbmMwqfzcUejVKp4tGEysNckmbTmZXnxpdDtJX1VkB71oTDhGsvdZqQvQt0-Ks0f8'
            ],
            (object) [
                'id' => 2,
                'name' => 'David Chen',
                'message' => 'Awaiting Onboarding',
                'avatar' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD1qOQIgrNh-YoZWXSAA4mN-zW26yiF89k8uYDO4OV1G1Hl1ejyXfQhWAKMwoBWoNv53prefs_r7S0OUW-6gB9z_aBG0qMeU2vDIKZOXsqqejGq1Mt9N2Gmf1SorliAS5GO7a8LbvCwttkgsnIFg0TrpVDiyjJHxIDb8OhB5AX9vvgkddPZyCogEbpVRUl89Q0E50EGiGl66I4PxhnZf1l4u0afjhWDACrEbro8l_Fix1AiD4ye-4Egix2LiIVoZp0Uw038JacVYj7d'
            ]
        ];

        // Atividade dos clientes
        $clientActivities = [
            (object) [
                'id' => 1,
                'client_name' => 'Alex Morgan',
                'activity' => 'completed Chest Day B workout',
                'time' => '2 hours ago',
                'is_primary' => true
            ],
            (object) [
                'id' => 2,
                'client_name' => 'Sarah Jenkins',
                'activity' => 'reached a new PB in Deadlift (120kg)',
                'time' => '5 hours ago',
                'is_primary' => true
            ],
            (object) [
                'id' => 3,
                'client_name' => 'Chris Evans',
                'activity' => 'updated nutrition log',
                'time' => 'Yesterday',
                'is_primary' => false
            ]
        ];

        // Links para navegação
        $links = (object) [
            'calendar' => route('dashboard.calendar'),
            'new_workout' => route('workout-plans.create'),
            'clients' => route('clients.index'),
            'reports' => route('reports.generate'),
            'privacy' => route('privacy'),
            'support' => route('support'),
            'community' => route('community'),
            'notifications' => route('notifications.index'),
            'settings' => route('settings.index'),
            'activity_all' => route('activity.index')
        ];

        return view('dashboard.trainer', [
            'trainer' => $trainer,
            'metrics' => $metrics,
            'todaySchedule' => $todaySchedule,
            'newClientAlerts' => $newClientAlerts,
            'clientActivities' => $clientActivities,
            'links' => $links
        ]);
    }
}
