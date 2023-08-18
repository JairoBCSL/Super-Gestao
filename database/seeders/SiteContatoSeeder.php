<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds. php artisan db:seed --class=SiteContatoSeeder
     * 
     * @return void
     */
    public function run()
    {
        
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(84)98765-4321';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão!';
        $contato->save();
        

        factory(SiteContatoFactory::class, 100)->create();
    }
}
