<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(FornecedorSeeder::class);
        //$this->call(MotivoContatoSeeder::class);
        //$this->call(SiteContatoSeeder::class);
        \App\Models\SiteContato::factory(100)->create();
        \App\Models\Fornecedor::factory(100)->create();
        //\App\Models\Produto::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
