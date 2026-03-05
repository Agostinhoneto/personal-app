<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Personal;
use App\Models\Aluno;
use App\Models\Treino;
use App\Models\Avaliacao;
use App\Models\PlanoAlimentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar Personal Trainer
        $personal = User::create([
            'nome' => 'Agostinho',
            'email' => 'agostinho@fitassist.com',
            'password' => Hash::make('password'),
            'tipo' => 'personal',
            'telefone' => '(11) 98765-4321',
            'status' => true,
        ]);

        // Criar perfil de Personal
        $personalProfile = Personal::create([
            'usuario_id' => $personal->id,
            'cref' => '123456-G/SP',
            'especialidade' => 'Musculação e Emagrecimento',
            'biografia' => 'Personal trainer com 10 anos de experiência em treinos de força e condicionamento físico.',
        ]);

        // Criar Alunos
        $aluno1 = User::create([
            'nome' => 'João Silva',
            'email' => 'joao@example.com',
            'password' => Hash::make('password'),
            'tipo' => 'aluno',
            'telefone' => '(11) 91234-5678',
            'status' => true,
        ]);

        $alunoProfile1 = Aluno::create([
            'usuario_id' => $aluno1->id,
            'personal_id' => $personalProfile->id,
            'data_nascimento' => '1990-05-15',
            'sexo' => 'M',
            'objetivo' => 'Ganho de massa muscular',
        ]);

        $aluno2 = User::create([
            'nome' => 'Maria Santos',
            'email' => 'maria@example.com',
            'password' => Hash::make('password'),
            'tipo' => 'aluno',
            'telefone' => '(11) 92345-6789',
            'status' => true,
        ]);

        $alunoProfile2 = Aluno::create([
            'usuario_id' => $aluno2->id,
            'personal_id' => $personalProfile->id,
            'data_nascimento' => '1995-08-22',
            'sexo' => 'F',
            'objetivo' => 'Perda de peso e condicionamento',
        ]);

        $aluno3 = User::create([
            'nome' => 'Pedro Costa',
            'email' => 'pedro@example.com',
            'password' => Hash::make('password'),
            'tipo' => 'aluno',
            'telefone' => '(11) 93456-7890',
            'status' => true,
        ]);

        $alunoProfile3 = Aluno::create([
            'usuario_id' => $aluno3->id,
            'personal_id' => $personalProfile->id,
            'data_nascimento' => '1988-12-10',
            'sexo' => 'M',
            'objetivo' => 'Manutenção e saúde',
        ]);

        // Criar Treinos
        Treino::create([
            'aluno_id' => $alunoProfile1->id,
            'personal_id' => $personalProfile->id,
            'nome' => 'Treino de Hipertrofia A',
            'data_inicio' => Carbon::now()->subDays(30),
            'data_fim' => Carbon::now()->addDays(30),
            'objetivo' => 'Ganho de massa muscular',
            'status' => 'ativo',
        ]);

        Treino::create([
            'aluno_id' => $alunoProfile2->id,
            'personal_id' => $personalProfile->id,
            'nome' => 'Treino de Emagrecimento',
            'data_inicio' => Carbon::now()->subDays(15),
            'data_fim' => Carbon::now()->addDays(45),
            'objetivo' => 'Perda de peso',
            'status' => 'ativo',
        ]);

        // Criar Avaliações
        Avaliacao::create([
            'aluno_id' => $alunoProfile1->id,
            'personal_id' => $personalProfile->id,
            'data_avaliacao' => Carbon::now()->subDays(7),
            'peso' => 75.5,
            'altura' => 1.75,
            'imc' => 24.6,
            'gordura_corporal' => 15.5,
            'massa_muscular' => 63.9,
        ]);

        Avaliacao::create([
            'aluno_id' => $alunoProfile2->id,
            'personal_id' => $personalProfile->id,
            'data_avaliacao' => Carbon::now()->subDays(3),
            'peso' => 68.0,
            'altura' => 1.65,
            'imc' => 25.0,
            'gordura_corporal' => 28.0,
            'massa_muscular' => 49.0,
        ]);

        Avaliacao::create([
            'aluno_id' => $alunoProfile1->id,
            'personal_id' => $personalProfile->id,
            'data_avaliacao' => Carbon::now()->subDays(2),
            'peso' => 74.8,
            'altura' => 1.75,
            'imc' => 24.4,
            'gordura_corporal' => 14.8,
            'massa_muscular' => 64.2,
        ]);

        // Criar Planos Alimentares
        PlanoAlimentar::create([
            'aluno_id' => $alunoProfile1->id,
            'personal_id' => $personalProfile->id,
            'nome' => 'Plano Hipertrofia',
            'data_inicio' => Carbon::now()->subDays(20),
            'data_fim' => Carbon::now()->addDays(40),
            'calorias_diarias' => 2800,
            'proteinas' => 180,
            'carboidratos' => 350,
            'gorduras' => 80,
            'observacoes' => 'Foco em ganho de massa muscular',
        ]);

        PlanoAlimentar::create([
            'aluno_id' => $alunoProfile2->id,
            'personal_id' => $personalProfile->id,
            'nome' => 'Plano Emagrecimento',
            'data_inicio' => Carbon::now()->subDays(10),
            'data_fim' => Carbon::now()->addDays(50),
            'calorias_diarias' => 1600,
            'proteinas' => 120,
            'carboidratos' => 150,
            'gorduras' => 50,
            'observacoes' => 'Déficit calórico para perda de peso',
        ]);

        $this->command->info('✅ Usuários de teste criados com sucesso!');
        $this->command->info('📧 Personal: agostinho@fitassist.com | password: password');
        $this->command->info('📧 Aluno 1: joao@example.com | password: password');
        $this->command->info('📧 Aluno 2: maria@example.com | password: password');
        $this->command->info('📧 Aluno 3: pedro@example.com | password: password');
    }
}

