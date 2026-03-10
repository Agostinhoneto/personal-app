<?php

namespace Database\Seeders;

use App\Models\CategoriaTreino;
use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaTreinoSeeder extends Seeder
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

        $categorias = [
            [
                'personal_id' => $personal->id,
                'nome' => 'Peito',
                'descricao' => 'Exercícios para o desenvolvimento do peitoral',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Costas',
                'descricao' => 'Exercícios para desenvolvimento da musculatura das costas',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Pernas',
                'descricao' => 'Exercícios para membros inferiores (quadríceps, posterior, glúteos)',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Ombros',
                'descricao' => 'Exercícios para desenvolvimento dos deltoides',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Bíceps',
                'descricao' => 'Exercícios para bíceps braquial e antebraços',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Tríceps',
                'descricao' => 'Exercícios para tríceps braquial',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Abdômen',
                'descricao' => 'Exercícios para fortalecimento do core e abdominais',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Cardio',
                'descricao' => 'Exercícios cardiovasculares e aeróbicos',
            ],
            [
                'personal_id' => $personal->id,
                'nome' => 'Funcional',
                'descricao' => 'Exercícios funcionais e de mobilidade',
            ],
        ];

        foreach ($categorias as $categoria) {
            CategoriaTreino::create($categoria);
        }

        $this->command->info('✅ Categorias de treino criadas com sucesso!');
    }
}
