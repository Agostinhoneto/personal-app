<?php

namespace Database\Seeders;

use App\Models\TreinoExercicio;
use App\Models\Treino;
use App\Models\Exercicio;
use App\Models\CategoriaTreino;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreinoExercicioSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treinos = Treino::all();

        if ($treinos->isEmpty()) {
            $this->command->warn('⚠️  Nenhum treino encontrado. Execute UserSeeder primeiro.');
            return;
        }

        $categorias = CategoriaTreino::all()->keyBy('nome');
        $exercicios = Exercicio::all()->keyBy('nome');

        if ($exercicios->isEmpty()) {
            $this->command->warn('⚠️  Nenhum exercício encontrado. Execute ExercicioSeeder primeiro.');
            return;
        }

        // Treino de Hipertrofia A - João Silva
        $treinoHipertrofia = $treinos->where('nome', 'Treino de Hipertrofia A')->first();
        
        if ($treinoHipertrofia) {
            $exerciciosHipertrofia = [
                // Peito
                [
                    'treino_id' => $treinoHipertrofia->id,
                    'exercicio_id' => $exercicios['Supino Reto com Barra']->id ?? null,
                    'series' => 4,
                    'repeticoes' => '8-10',
                    'carga' => 80.00,
                    'tempo_descanso' => 90,
                    'observacoes' => 'Aumentar carga progressivamente',
                    'ordem' => 1,
                ],
                [
                    'treino_id' => $treinoHipertrofia->id,
                    'exercicio_id' => $exercicios['Supino Inclinado com Halteres']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '10-12',
                    'carga' => 30.00,
                    'tempo_descanso' => 60,
                    'ordem' => 2,
                ],
                [
                    'treino_id' => $treinoHipertrofia->id,
                    'exercicio_id' => $exercicios['Crucifixo']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '12-15',
                    'carga' => 15.00,
                    'tempo_descanso' => 60,
                    'ordem' => 3,
                ],
                // Tríceps
                [
                    'treino_id' => $treinoHipertrofia->id,
                    'exercicio_id' => $exercicios['Tríceps Testa']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '10-12',
                    'carga' => 25.00,
                    'tempo_descanso' => 60,
                    'ordem' => 4,
                ],
                [
                    'treino_id' => $treinoHipertrofia->id,
                    'exercicio_id' => $exercicios['Tríceps Corda na Polia']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '12-15',
                    'carga' => 30.00,
                    'tempo_descanso' => 45,
                    'ordem' => 5,
                ],
            ];

            foreach ($exerciciosHipertrofia as $exercicio) {
                if ($exercicio['exercicio_id']) {
                    TreinoExercicio::create($exercicio);
                }
            }
        }

        // Treino de Emagrecimento - Maria Santos
        $treinoEmagrecimento = $treinos->where('nome', 'Treino de Emagrecimento')->first();
        
        if ($treinoEmagrecimento) {
            $exerciciosEmagrecimento = [
                // Aquecimento Cardio
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Esteira']->id ?? null,
                    'series' => 1,
                    'repeticoes' => '10 min',
                    'tempo_descanso' => 0,
                    'observacoes' => 'Aquecimento moderado',
                    'ordem' => 1,
                ],
                // Circuito Funcional
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Burpee']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '15',
                    'tempo_descanso' => 30,
                    'observacoes' => 'Executar com ritmo controlado',
                    'ordem' => 2,
                ],
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Mountain Climber']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '20',
                    'tempo_descanso' => 30,
                    'ordem' => 3,
                ],
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Agachamento Livre']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '15-20',
                    'carga' => 30.00,
                    'tempo_descanso' => 45,
                    'ordem' => 4,
                ],
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Flexão de Braço']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '12-15',
                    'tempo_descanso' => 45,
                    'ordem' => 5,
                ],
                // Abdômen
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Prancha']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '45s',
                    'tempo_descanso' => 30,
                    'ordem' => 6,
                ],
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Abdominal Oblíquo']->id ?? null,
                    'series' => 3,
                    'repeticoes' => '20',
                    'tempo_descanso' => 30,
                    'ordem' => 7,
                ],
                // Cardio Final
                [
                    'treino_id' => $treinoEmagrecimento->id,
                    'exercicio_id' => $exercicios['Bicicleta Ergométrica']->id ?? null,
                    'series' => 1,
                    'repeticoes' => '20 min',
                    'tempo_descanso' => 0,
                    'observacoes' => 'Intensidade moderada a alta',
                    'ordem' => 8,
                ],
            ];

            foreach ($exerciciosEmagrecimento as $exercicio) {
                if ($exercicio['exercicio_id']) {
                    TreinoExercicio::create($exercicio);
                }
            }
        }

        $this->command->info('✅ Exercícios adicionados aos treinos com sucesso!');
    }
}
