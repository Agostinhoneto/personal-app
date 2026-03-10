<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Usuários e perfis (Personal e Alunos)
            UserSeeder::class,
            
            // Categorias e Exercícios
            CategoriaTreinoSeeder::class,
            ExercicioSeeder::class,
            TreinoExercicioSeeder::class,
            
            // Alimentos e Refeições
            AlimentoSeeder::class,
            RefeicaoSeeder::class,
            RefeicaoAlimentoSeeder::class,
        ]);
    }
}
