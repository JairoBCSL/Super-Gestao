<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nome = fake()->name();
        return [
            'nome' => $nome,
            'site' => $nome.'.com.br',
            'uf' => fake()->randomLetter().fake()->randomLetter(),
            'email' => 'contato@'.$nome.'.com.br',
        ];
    }
}
