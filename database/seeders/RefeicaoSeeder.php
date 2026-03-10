<?php

namespace Database\Seeders;

use App\Models\Refeicao;
use App\Models\PlanoAlimentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefeicaoSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planos = PlanoAlimentar::all();

        if ($planos->isEmpty()) {
            $this->command->warn('⚠️  Nenhum plano alimentar encontrado. Execute UserSeeder primeiro.');
            return;
        }

        // Plano Hipertrofia - João Silva
        $planoHipertrofia = $planos->where('nome', 'Plano Hipertrofia')->first();
        
        if ($planoHipertrofia) {
            $refeicoesHipertrofia = [
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Café da Manhã',
                    'horario' => '07:00:00',
                    'ordem' => 1,
                ],
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Lanche da Manhã',
                    'horario' => '10:00:00',
                    'ordem' => 2,
                ],
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Almoço',
                    'horario' => '12:30:00',
                    'ordem' => 3,
                ],
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Lanche da Tarde',
                    'horario' => '15:30:00',
                    'ordem' => 4,
                ],
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Pré-Treino',
                    'horario' => '17:30:00',
                    'ordem' => 5,
                ],
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Pós-Treino',
                    'horario' => '19:30:00',
                    'ordem' => 6,
                ],
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Jantar',
                    'horario' => '20:30:00',
                    'ordem' => 7,
                ],
                [
                    'plano_id' => $planoHipertrofia->id,
                    'nome' => 'Ceia',
                    'horario' => '22:30:00',
                    'ordem' => 8,
                ],
            ];

            foreach ($refeicoesHipertrofia as $refeicao) {
                Refeicao::create($refeicao);
            }
        }

        // Plano Emagrecimento - Maria Santos
        $planoEmagrecimento = $planos->where('nome', 'Plano Emagrecimento')->first();
        
        if ($planoEmagrecimento) {
            $refeicoesEmagrecimento = [
                [
                    'plano_id' => $planoEmagrecimento->id,
                    'nome' => 'Café da Manhã',
                    'horario' => '07:30:00',
                    'ordem' => 1,
                ],
                [
                    'plano_id' => $planoEmagrecimento->id,
                    'nome' => 'Lanche da Manhã',
                    'horario' => '10:00:00',
                    'ordem' => 2,
                ],
                [
                    'plano_id' => $planoEmagrecimento->id,
                    'nome' => 'Almoço',
                    'horario' => '12:00:00',
                    'ordem' => 3,
                ],
                [
                    'plano_id' => $planoEmagrecimento->id,
                    'nome' => 'Lanche da Tarde',
                    'horario' => '16:00:00',
                    'ordem' => 4,
                ],
                [
                    'plano_id' => $planoEmagrecimento->id,
                    'nome' => 'Jantar',
                    'horario' => '19:00:00',
                    'ordem' => 5,
                ],
            ];

            foreach ($refeicoesEmagrecimento as $refeicao) {
                Refeicao::create($refeicao);
            }
        }

        $this->command->info('✅ Refeições criadas com sucesso!');
    }
}
