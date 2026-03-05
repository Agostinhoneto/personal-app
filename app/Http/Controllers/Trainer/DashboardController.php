<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Avaliacao;
use App\Models\PlanoAlimentar;
use App\Models\Personal;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Buscar perfil do personal
        $personal = Personal::where('usuario_id', $user->id)->first();
        
        if (!$personal) {
            return redirect()->route('home')->with('error', 'Personal não encontrado');
        }

        // Total de alunos
        $totalClients = Aluno::where('personal_id', $personal->id)->count();
        
        // Novos alunos este mês
        $newClientsMonth = Aluno::where('personal_id', $personal->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        
        // Treinos ativos
        $activeSessions = Treino::where('personal_id', $personal->id)
            ->where('status', 'ativo')
            ->count();
        
        // Avaliações realizadas este mês
        $avgCompletion = Avaliacao::where('personal_id', $personal->id)
            ->whereMonth('data_avaliacao', Carbon::now()->month)
            ->whereYear('data_avaliacao', Carbon::now()->year)
            ->count();
        
        // Sessões de hoje (treinos agendados para hoje)
        $todaySessions = Treino::where('personal_id', $personal->id)
            ->where('status', 'ativo')
            ->with('aluno.usuario')
            ->take(3)
            ->get()
            ->map(function($treino) {
                return [
                    'time' => '08:00 AM',
                    'client' => $treino->aluno->usuario->nome,
                    'title' => $treino->nome,
                    'status' => 'upcoming'
                ];
            });
        
        // Novos alunos recentes
        $newClients = Aluno::where('personal_id', $personal->id)
            ->with('usuario')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function($aluno) {
                return [
                    'name' => $aluno->usuario->nome,
                    'message' => 'Objetivo: ' . $aluno->objetivo,
                    'avatar' => $aluno->usuario->foto ?? ''
                ];
            });
        
        // Atividades recentes (últimas avaliações e treinos)
        $activities = Avaliacao::where('personal_id', $personal->id)
            ->with('aluno.usuario')
            ->orderBy('data_avaliacao', 'desc')
            ->limit(5)
            ->get()
            ->map(function($avaliacao) {
                return [
                    'client' => $avaliacao->aluno->usuario->nome,
                    'activity' => 'realizou avaliação física - Peso: ' . $avaliacao->peso . 'kg',
                    'time' => $avaliacao->data_avaliacao->diffForHumans(),
                    'status' => 'completed'
                ];
            });

        $data = [
            'userName' => $user->nome,
            'sessionsToday' => $todaySessions->count(),
            'totalClients' => $totalClients,
            'newClientsMonth' => $newClientsMonth,
            'activeSessions' => $activeSessions,
            'avgCompletion' => $avgCompletion,
            'todaySessions' => $todaySessions,
            'newClients' => $newClients,
            'activities' => $activities
        ];

        return view('trainer.dashboard', $data);
    }
}
