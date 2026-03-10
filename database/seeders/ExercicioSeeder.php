<?php

namespace Database\Seeders;

use App\Models\Exercicio;
use App\Models\CategoriaTreino;
use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExercicioSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personal = Personal::first();

        if (!$personal) {
            $this->command->warn('⚠️  Nenhum personal encontrado. Execute UserSeeder primeiro.');
            return;
        }

        // Buscar categorias
        $categorias = CategoriaTreino::where('personal_id', $personal->id)->get()->keyBy('nome');

        if ($categorias->isEmpty()) {
            $this->command->warn('⚠️  Nenhuma categoria encontrada. Execute CategoriaTreinoSeeder primeiro.');
            return;
        }

        $exercicios = [
            // Peito
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Peito']->id ?? null,
                'nome' => 'Supino Reto com Barra',
                'descricao' => 'Exercício básico para desenvolvimento do peitoral maior',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Peito']->id ?? null,
                'nome' => 'Supino Inclinado com Halteres',
                'descricao' => 'Foco na porção superior do peitoral',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Peito']->id ?? null,
                'nome' => 'Crucifixo',
                'descricao' => 'Exercício de isolamento para peitoral',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Peito']->id ?? null,
                'nome' => 'Flexão de Braço',
                'descricao' => 'Exercício com peso corporal para peito, ombros e tríceps',
            ],

            // Costas
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Costas']->id ?? null,
                'nome' => 'Barra Fixa',
                'descricao' => 'Exercício composto para desenvolvimento das costas',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Costas']->id ?? null,
                'nome' => 'Remada Curvada',
                'descricao' => 'Exercício para espessura das costas',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Costas']->id ?? null,
                'nome' => 'Puxada Alta',
                'descricao' => 'Exercício para largura do dorsal',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Costas']->id ?? null,
                'nome' => 'Remada Baixa',
                'descricao' => 'Exercício para região média das costas',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Costas']->id ?? null,
                'nome' => 'Levantamento Terra',
                'descricao' => 'Exercício composto para costas, pernas e lombar',
            ],

            // Pernas
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Pernas']->id ?? null,
                'nome' => 'Agachamento Livre',
                'descricao' => 'Rei dos exercícios para membros inferiores',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Pernas']->id ?? null,
                'nome' => 'Leg Press 45°',
                'descricao' => 'Exercício composto para quadríceps, glúteos e posterior',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Pernas']->id ?? null,
                'nome' => 'Cadeira Extensora',
                'descricao' => 'Isolamento para quadríceps',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Pernas']->id ?? null,
                'nome' => 'Mesa Flexora',
                'descricao' => 'Isolamento para posterior de coxa',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Pernas']->id ?? null,
                'nome' => 'Panturrilha em Pé',
                'descricao' => 'Exercício para gastrocnêmio',
            ],

            // Ombros
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Ombros']->id ?? null,
                'nome' => 'Desenvolvimento com Barra',
                'descricao' => 'Exercício composto para deltoides',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Ombros']->id ?? null,
                'nome' => 'Elevação Lateral',
                'descricao' => 'Isolamento para deltoide médio',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Ombros']->id ?? null,
                'nome' => 'Elevação Frontal',
                'descricao' => 'Isolamento para deltoide anterior',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Ombros']->id ?? null,
                'nome' => 'Crucifixo Invertido',
                'descricao' => 'Isolamento para deltoide posterior',
            ],

            // Bíceps
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Bíceps']->id ?? null,
                'nome' => 'Rosca Direta com Barra',
                'descricao' => 'Exercício básico para bíceps',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Bíceps']->id ?? null,
                'nome' => 'Rosca Alternada com Halteres',
                'descricao' => 'Exercício para desenvolvimento bilateral',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Bíceps']->id ?? null,
                'nome' => 'Rosca Martelo',
                'descricao' => 'Exercício para bíceps e braquial',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Bíceps']->id ?? null,
                'nome' => 'Rosca Scott',
                'descricao' => 'Isolamento para bíceps braquial',
            ],

            // Tríceps
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Tríceps']->id ?? null,
                'nome' => 'Tríceps Testa',
                'descricao' => 'Exercício de isolamento para tríceps',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Tríceps']->id ?? null,
                'nome' => 'Tríceps Corda na Polia',
                'descricao' => 'Isolamento para todas as cabeças do tríceps',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Tríceps']->id ?? null,
                'nome' => 'Supino Fechado',
                'descricao' => 'Exercício composto para tríceps',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Tríceps']->id ?? null,
                'nome' => 'Mergulho entre Barras',
                'descricao' => 'Exercício com peso corporal para tríceps',
            ],

            // Abdômen
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Abdômen']->id ?? null,
                'nome' => 'Abdominal Supra',
                'descricao' => 'Exercício para reto abdominal superior',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Abdômen']->id ?? null,
                'nome' => 'Elevação de Pernas',
                'descricao' => 'Exercício para reto abdominal inferior',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Abdômen']->id ?? null,
                'nome' => 'Prancha',
                'descricao' => 'Exercício isométrico para core',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Abdômen']->id ?? null,
                'nome' => 'Abdominal Oblíquo',
                'descricao' => 'Exercício para oblíquos externos e internos',
            ],

            // Cardio
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Cardio']->id ?? null,
                'nome' => 'Esteira',
                'descricao' => 'Corrida ou caminhada em esteira',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Cardio']->id ?? null,
                'nome' => 'Bicicleta Ergométrica',
                'descricao' => 'Exercício cardiovascular de baixo impacto',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Cardio']->id ?? null,
                'nome' => 'Elíptico',
                'descricao' => 'Exercício cardiovascular completo',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Cardio']->id ?? null,
                'nome' => 'Pular Corda',
                'descricao' => 'Exercício cardiovascular de alta intensidade',
            ],

            // Funcional
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Funcional']->id ?? null,
                'nome' => 'Burpee',
                'descricao' => 'Exercício funcional de corpo inteiro',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Funcional']->id ?? null,
                'nome' => 'Kettlebell Swing',
                'descricao' => 'Exercício funcional para posterior e core',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Funcional']->id ?? null,
                'nome' => 'Mountain Climber',
                'descricao' => 'Exercício funcional para core e cardio',
            ],
            [
                'personal_id' => $personal->id,
                'categoria_id' => $categorias['Funcional']->id ?? null,
                'nome' => 'Agachamento Sumô',
                'descricao' => 'Variação funcional do agachamento',
            ],
        ];

        foreach ($exercicios as $exercicio) {
            if ($exercicio['categoria_id']) {
                Exercicio::create($exercicio);
            }
        }

        $this->command->info('✅ Exercícios criados com sucesso!');
    }
}
