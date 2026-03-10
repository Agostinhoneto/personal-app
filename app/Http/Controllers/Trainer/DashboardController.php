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
use App\Models\RegistroTreino;
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
        $avaliacoesDoMes = Avaliacao::where('personal_id', $personal->id)
            ->whereMonth('data_avaliacao', Carbon::now()->month)
            ->whereYear('data_avaliacao', Carbon::now()->year)
            ->count();
        
        // Sessões de hoje (treinos ativos - na vida real, aqui usaríamos horários agendados)
        $todaySessions = Treino::where('personal_id', $personal->id)
            ->where('status', 'ativo')
            ->whereBetween('data_inicio', [Carbon::now()->subDays(30), Carbon::now()])
            ->with(['aluno.usuario', 'exercicios'])
            ->limit(5)
            ->get()
            ->map(function($treino, $index) {
                // Simular horários ao longo do dia
                $horarios = ['08:00', '10:00', '14:00', '16:00', '18:00'];
                $totalExercicios = $treino->exercicios->count();
                
                return [
                    'time' => $horarios[$index % count($horarios)] ?? '09:00',
                    'client' => $treino->aluno->usuario->nome ?? 'Aluno',
                    'title' => $treino->nome,
                    'status' => 'upcoming',
                    'exercises' => $totalExercicios . ' exercícios'
                ];
            });
        
        // Novos alunos recentes
        $newClients = Aluno::where('personal_id', $personal->id)
            ->with('usuario')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function($aluno) {
                $sexo = $aluno->sexo == 'M' ? '👨' : '👩';
                $idade = $aluno->data_nascimento 
                    ? Carbon::parse($aluno->data_nascimento)->age . ' anos' 
                    : '';
                
                return [
                    'name' => $aluno->usuario->nome,
                    'message' => $sexo . ' ' . $idade . ' - ' . ($aluno->objetivo ?? 'Sem objetivo definido'),
                    'avatar' => $aluno->usuario->foto ?? ''
                ];
            });
        
        // Atividades recentes (combinando avaliações, treinos e planos alimentares)
        $atividadesAvaliacoes = Avaliacao::where('personal_id', $personal->id)
            ->with('aluno.usuario')
            ->orderBy('data_avaliacao', 'desc')
            ->limit(3)
            ->get()
            ->map(function($avaliacao) {
                $imc = $avaliacao->imc ? number_format($avaliacao->imc, 1) : 'N/A';
                $percentualGordura = $avaliacao->gordura_corporal ? number_format($avaliacao->gordura_corporal, 1) . '%' : 'N/A';
                
                return [
                    'client' => $avaliacao->aluno->usuario->nome ?? 'Aluno',
                    'activity' => "realizou avaliação física - Peso: {$avaliacao->peso}kg, IMC: {$imc}, BF: {$percentualGordura}",
                    'time' => Carbon::parse($avaliacao->data_avaliacao)->diffForHumans(),
                    'type' => 'avaliacao'
                ];
            });
        
        $atividadesTreinos = Treino::where('personal_id', $personal->id)
            ->with('aluno.usuario')
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get()
            ->map(function($treino) {
                $diasAtivo = Carbon::parse($treino->data_inicio)->diffInDays(Carbon::now());
                
                return [
                    'client' => $treino->aluno->usuario->nome ?? 'Aluno',
                    'activity' => "iniciou treino '{$treino->nome}' há {$diasAtivo} dias",
                    'time' => $treino->created_at->diffForHumans(),
                    'type' => 'treino'
                ];
            });
        
        // Combinar e ordenar atividades por data
        $activities = $atividadesAvaliacoes->concat($atividadesTreinos)
            ->sortByDesc('time')
            ->take(5)
            ->values();

        $data = [
            'userName' => $user->nome,
            'sessionsToday' => $todaySessions->count(),
            'totalClients' => $totalClients,
            'newClientsMonth' => $newClientsMonth,
            'activeSessions' => $activeSessions,
            'avgCompletion' => $avaliacoesDoMes,
            'todaySessions' => $todaySessions,
            'newClients' => $newClients,
            'activities' => $activities
        ];

        return view('trainer.dashboard', $data);
    }
}
