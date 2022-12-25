<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Veiculos;
class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veiculos::create([
            'proprietario' => 'Lucas Mariano',
            'marca' => 'nissan',
            'modelo'=> 'versa',
            'versao' =>1.6,
            'placa' => 'pbb1950',
            'telefone' => '61985736330'
        ]);
    }
}

 