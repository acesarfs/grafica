<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Orcamento;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pedido1 = [
            'user_id' => 1,
            'descricao' => 'Livro - A educação universitária',
            'tipo' => 'Diagramação + Impressão',
            'paginas' => 200,
            'centro_de_despesa' => 'Centro de Despesa da FFLCH', 
            'responsavel_centro_despesa' => 65389,                     
        ];
        Pedido::create($pedido1);

        Pedido::factory(5)->create()->each(function ($pedido) {           
            $orcamentos = Orcamento::factory(4)->make();
            $pedido->orcamentos()->saveMany($orcamentos);
        });
    }
}
