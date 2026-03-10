<?php

namespace Database\Seeders;

use App\Models\RefeicaoAlimento;
use App\Models\Refeicao;
use App\Models\Alimento;
use App\Models\PlanoAlimentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefeicaoAlimentoSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $refeicoes = Refeicao::all();

        if ($refeicoes->isEmpty()) {
            $this->command->warn('⚠️  Nenhuma refeição encontrada. Execute RefeicaoSeeder primeiro.');
            return;
        }

        $alimentos = Alimento::all()->keyBy('nome');

        if ($alimentos->isEmpty()) {
            $this->command->warn('⚠️  Nenhum alimento encontrado. Execute AlimentoSeeder primeiro.');
            return;
        }

        // Plano Hipertrofia - João Silva
        $planoHipertrofia = PlanoAlimentar::where('nome', 'Plano Hipertrofia')->first();
        
        if ($planoHipertrofia) {
            $refeicoesHipertrofia = Refeicao::where('plano_id', $planoHipertrofia->id)->get()->keyBy('nome');

            // Café da Manhã
            if (isset($refeicoesHipertrofia['Café da Manhã'])) {
                $this->addAlimentos($refeicoesHipertrofia['Café da Manhã']->id, [
                    ['alimento' => 'Aveia', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                    ['alimento' => 'Banana', 'quantidade' => 1.00, 'unidade' => 'unidade', 'alimentos' => $alimentos],
                    ['alimento' => 'Leite Desnatado', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                    ['alimento' => 'Pasta de Amendoim', 'quantidade' => 1.00, 'unidade' => 'colher sopa', 'alimentos' => $alimentos],
                ]);
            }

            // Lanche da Manhã
            if (isset($refeicoesHipertrofia['Lanche da Manhã'])) {
                $this->addAlimentos($refeicoesHipertrofia['Lanche da Manhã']->id, [
                    ['alimento' => 'Ovo Cozido', 'quantidade' => 3.00, 'unidade' => 'unidades', 'alimentos' => $alimentos],
                    ['alimento' => 'Pão Integral', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                ]);
            }

            // Almoço
            if (isset($refeicoesHipertrofia['Almoço'])) {
                $this->addAlimentos($refeicoesHipertrofia['Almoço']->id, [
                    ['alimento' => 'Peito de Frango Grelhado', 'quantidade' => 200.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Arroz Integral', 'quantidade' => 150.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Batata Doce', 'quantidade' => 150.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Brócolis', 'quantidade' => 100.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Azeite de Oliva', 'quantidade' => 1.00, 'unidade' => 'colher sopa', 'alimentos' => $alimentos],
                ]);
            }

            // Lanche da Tarde
            if (isset($refeicoesHipertrofia['Lanche da Tarde'])) {
                $this->addAlimentos($refeicoesHipertrofia['Lanche da Tarde']->id, [
                    ['alimento' => 'Iogurte Grego Natural', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                    ['alimento' => 'Amendoim', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                ]);
            }

            // Pré-Treino
            if (isset($refeicoesHipertrofia['Pré-Treino'])) {
                $this->addAlimentos($refeicoesHipertrofia['Pré-Treino']->id, [
                    ['alimento' => 'Tapioca', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                    ['alimento' => 'Ovo Cozido', 'quantidade' => 2.00, 'unidade' => 'unidades', 'alimentos' => $alimentos],
                    ['alimento' => 'Banana', 'quantidade' => 1.00, 'unidade' => 'unidade', 'alimentos' => $alimentos],
                ]);
            }

            // Pós-Treino
            if (isset($refeicoesHipertrofia['Pós-Treino'])) {
                $this->addAlimentos($refeicoesHipertrofia['Pós-Treino']->id, [
                    ['alimento' => 'Whey Protein', 'quantidade' => 1.00, 'unidade' => 'scoop', 'alimentos' => $alimentos],
                    ['alimento' => 'Banana', 'quantidade' => 1.00, 'unidade' => 'unidade', 'alimentos' => $alimentos],
                ]);
            }

            // Jantar
            if (isset($refeicoesHipertrofia['Jantar'])) {
                $this->addAlimentos($refeicoesHipertrofia['Jantar']->id, [
                    ['alimento' => 'Filé de Tilápia', 'quantidade' => 200.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Arroz Integral', 'quantidade' => 100.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Couve', 'quantidade' => 100.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                ]);
            }

            // Ceia
            if (isset($refeicoesHipertrofia['Ceia'])) {
                $this->addAlimentos($refeicoesHipertrofia['Ceia']->id, [
                    ['alimento' => 'Queijo Cottage', 'quantidade' => 100.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Castanha do Pará', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                ]);
            }
        }

        // Plano Emagrecimento - Maria Santos
        $planoEmagrecimento = PlanoAlimentar::where('nome', 'Plano Emagrecimento')->first();
        
        if ($planoEmagrecimento) {
            $refeicoesEmagrecimento = Refeicao::where('plano_id', $planoEmagrecimento->id)->get()->keyBy('nome');

            // Café da Manhã
            if (isset($refeicoesEmagrecimento['Café da Manhã'])) {
                $this->addAlimentos($refeicoesEmagrecimento['Café da Manhã']->id, [
                    ['alimento' => 'Ovo Cozido', 'quantidade' => 2.00, 'unidade' => 'unidades', 'alimentos' => $alimentos],
                    ['alimento' => 'Pão Integral', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                    ['alimento' => 'Café', 'quantidade' => 1.00, 'unidade' => 'xícara', 'observacoes' => 'Sem açúcar', 'alimentos' => $alimentos],
                ]);
            }

            // Lanche da Manhã
            if (isset($refeicoesEmagrecimento['Lanche da Manhã'])) {
                $this->addAlimentos($refeicoesEmagrecimento['Lanche da Manhã']->id, [
                    ['alimento' => 'Maçã', 'quantidade' => 1.00, 'unidade' => 'unidade', 'alimentos' => $alimentos],
                    ['alimento' => 'Castanha do Pará', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                ]);
            }

            // Almoço
            if (isset($refeicoesEmagrecimento['Almoço'])) {
                $this->addAlimentos($refeicoesEmagrecimento['Almoço']->id, [
                    ['alimento' => 'Peito de Frango Grelhado', 'quantidade' => 150.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Arroz Integral', 'quantidade' => 100.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Alface', 'quantidade' => 100.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Tomate', 'quantidade' => 50.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                ]);
            }

            // Lanche da Tarde
            if (isset($refeicoesEmagrecimento['Lanche da Tarde'])) {
                $this->addAlimentos($refeicoesEmagrecimento['Lanche da Tarde']->id, [
                    ['alimento' => 'Iogurte Grego Natural', 'quantidade' => 1.00, 'unidade' => 'porção', 'alimentos' => $alimentos],
                ]);
            }

            // Jantar
            if (isset($refeicoesEmagrecimento['Jantar'])) {
                $this->addAlimentos($refeicoesEmagrecimento['Jantar']->id, [
                    ['alimento' => 'Filé de Tilápia', 'quantidade' => 150.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Brócolis', 'quantidade' => 100.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                    ['alimento' => 'Batata Doce', 'quantidade' => 80.00, 'unidade' => 'gramas', 'alimentos' => $alimentos],
                ]);
            }
        }

        $this->command->info('✅ Alimentos adicionados às refeições com sucesso!');
    }

    /**
     * Helper para adicionar alimentos à refeição
     */
    private function addAlimentos($refeicao_id, array $alimentosData)
    {
        foreach ($alimentosData as $data) {
            if (isset($data['alimentos'][$data['alimento']])) {
                RefeicaoAlimento::create([
                    'refeicao_id' => $refeicao_id,
                    'alimento_id' => $data['alimentos'][$data['alimento']]->id,
                    'quantidade' => $data['quantidade'],
                    'unidade' => $data['unidade'],
                    'observacoes' => $data['observacoes'] ?? null,
                ]);
            }
        }
    }
}
