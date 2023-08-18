<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    protected $fillable = ['nome', 'site', 'uf', 'email'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor XYZ';
        $fornecedor->site = 'fornecedorxyz.com.br';
        $fornecedor->uf = 'RN';
        $fornecedor->email = 'contato@fornecedorxyz.com.br';

        $fornecedor->save();

        Fornecedor::create(['nome' => 'Fornecedor ABC', 'site' => 'fornecedorabc.com.br', 'uf' => 'SC', 'email' => 'contato@fornecedorabc.com.br']);

        \DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor IJK',
            'site' => 'fornecedorijk.com.br',
            'uf' => 'PR',
            'email' => 'contato@fornecedorijk.com.br'
        ]);*/
        factory(FornecedorFactory::class, 100)->create();
    }
}
