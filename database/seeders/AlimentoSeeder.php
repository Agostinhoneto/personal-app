<?php

namespace Database\Seeders;

use App\Models\Alimento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlimentoSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alimentos = [
            // Proteínas
            [
                'nome' => 'Peito de Frango Grelhado',
                'porcao' => '100g',
                'calorias' => 165,
                'proteinas' => 31.00,
                'carboidratos' => 0.00,
                'gorduras' => 3.60,
            ],
            [
                'nome' => 'Ovo Cozido',
                'porcao' => '1 unidade (50g)',
                'calorias' => 78,
                'proteinas' => 6.30,
                'carboidratos' => 0.60,
                'gorduras' => 5.30,
            ],
            [
                'nome' => 'Filé de Tilápia',
                'porcao' => '100g',
                'calorias' => 96,
                'proteinas' => 20.10,
                'carboidratos' => 0.00,
                'gorduras' => 1.70,
            ],
            [
                'nome' => 'Carne Vermelha Magra',
                'porcao' => '100g',
                'calorias' => 143,
                'proteinas' => 26.00,
                'carboidratos' => 0.00,
                'gorduras' => 4.00,
            ],
            [
                'nome' => 'Atum em Lata (água)',
                'porcao' => '100g',
                'calorias' => 116,
                'proteinas' => 25.50,
                'carboidratos' => 0.00,
                'gorduras' => 0.80,
            ],
            [
                'nome' => 'Whey Protein',
                'porcao' => '30g (1 scoop)',
                'calorias' => 120,
                'proteinas' => 24.00,
                'carboidratos' => 3.00,
                'gorduras' => 1.50,
            ],
            [
                'nome' => 'Queijo Cottage',
                'porcao' => '100g',
                'calorias' => 98,
                'proteinas' => 11.00,
                'carboidratos' => 3.40,
                'gorduras' => 4.30,
            ],

            // Carboidratos
            [
                'nome' => 'Arroz Integral',
                'porcao' => '100g cozido',
                'calorias' => 123,
                'proteinas' => 2.70,
                'carboidratos' => 25.80,
                'gorduras' => 1.00,
            ],
            [
                'nome' => 'Batata Doce',
                'porcao' => '100g',
                'calorias' => 86,
                'proteinas' => 1.60,
                'carboidratos' => 20.10,
                'gorduras' => 0.10,
            ],
            [
                'nome' => 'Aveia',
                'porcao' => '50g',
                'calorias' => 194,
                'proteinas' => 6.90,
                'carboidratos' => 33.50,
                'gorduras' => 3.50,
            ],
            [
                'nome' => 'Pão Integral',
                'porcao' => '2 fatias (50g)',
                'calorias' => 127,
                'proteinas' => 5.00,
                'carboidratos' => 24.00,
                'gorduras' => 1.50,
            ],
            [
                'nome' => 'Macarrão Integral',
                'porcao' => '100g cozido',
                'calorias' => 124,
                'proteinas' => 5.00,
                'carboidratos' => 26.00,
                'gorduras' => 0.50,
            ],
            [
                'nome' => 'Banana',
                'porcao' => '1 unidade média (100g)',
                'calorias' => 89,
                'proteinas' => 1.10,
                'carboidratos' => 22.80,
                'gorduras' => 0.30,
            ],
            [
                'nome' => 'Maçã',
                'porcao' => '1 unidade média (150g)',
                'calorias' => 78,
                'proteinas' => 0.40,
                'carboidratos' => 20.70,
                'gorduras' => 0.30,
            ],

            // Gorduras Boas
            [
                'nome' => 'Azeite de Oliva',
                'porcao' => '1 colher de sopa (13ml)',
                'calorias' => 119,
                'proteinas' => 0.00,
                'carboidratos' => 0.00,
                'gorduras' => 13.50,
            ],
            [
                'nome' => 'Castanha do Pará',
                'porcao' => '3 unidades (10g)',
                'calorias' => 66,
                'proteinas' => 1.40,
                'carboidratos' => 1.20,
                'gorduras' => 6.50,
            ],
            [
                'nome' => 'Amendoim',
                'porcao' => '30g',
                'calorias' => 170,
                'proteinas' => 7.80,
                'carboidratos' => 4.80,
                'gorduras' => 14.10,
            ],
            [
                'nome' => 'Abacate',
                'porcao' => '100g',
                'calorias' => 160,
                'proteinas' => 2.00,
                'carboidratos' => 8.50,
                'gorduras' => 14.70,
            ],
            [
                'nome' => 'Pasta de Amendoim',
                'porcao' => '1 colher de sopa (20g)',
                'calorias' => 115,
                'proteinas' => 4.00,
                'carboidratos' => 4.00,
                'gorduras' => 9.00,
            ],

            // Vegetais
            [
                'nome' => 'Brócolis',
                'porcao' => '100g',
                'calorias' => 34,
                'proteinas' => 2.80,
                'carboidratos' => 7.00,
                'gorduras' => 0.40,
            ],
            [
                'nome' => 'Couve',
                'porcao' => '100g',
                'calorias' => 33,
                'proteinas' => 3.30,
                'carboidratos' => 5.80,
                'gorduras' => 0.70,
            ],
            [
                'nome' => 'Alface',
                'porcao' => '100g',
                'calorias' => 15,
                'proteinas' => 1.40,
                'carboidratos' => 2.90,
                'gorduras' => 0.20,
            ],
            [
                'nome' => 'Tomate',
                'porcao' => '100g',
                'calorias' => 18,
                'proteinas' => 0.90,
                'carboidratos' => 3.90,
                'gorduras' => 0.20,
            ],

            // Laticínios
            [
                'nome' => 'Leite Desnatado',
                'porcao' => '200ml',
                'calorias' => 68,
                'proteinas' => 6.80,
                'carboidratos' => 9.60,
                'gorduras' => 0.20,
            ],
            [
                'nome' => 'Iogurte Grego Natural',
                'porcao' => '100g',
                'calorias' => 97,
                'proteinas' => 9.00,
                'carboidratos' => 3.98,
                'gorduras' => 5.00,
            ],

            // Complementos
            [
                'nome' => 'Tapioca',
                'porcao' => '2 colheres de sopa (30g)',
                'calorias' => 102,
                'proteinas' => 0.06,
                'carboidratos' => 25.20,
                'gorduras' => 0.03,
            ],
            [
                'nome' => 'Mel',
                'porcao' => '1 colher de sopa (20g)',
                'calorias' => 64,
                'proteinas' => 0.06,
                'carboidratos' => 17.30,
                'gorduras' => 0.00,
            ],
        ];

        foreach ($alimentos as $alimento) {
            Alimento::create($alimento);
        }

        $this->command->info('✅ Alimentos criados com sucesso!');
    }
}
