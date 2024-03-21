<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'id' => 1,
                'hotel_id' => 1,
                'name' => '01',
                'description' => 'Para a conveniência dos hóspedes, o quarto também está equipado com uma estação de café e chá, minibar abastecido e uma área de armazenamento espaçosa para bagagens. Além disso, uma ampla janela oferece vistas panorâmicas da cidade',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'hotel_id' => 1,
                'name' => '02',
                'description' => 'Para a conveniência dos hóspedes, o quarto também está equipado com uma estação de café e chá, minibar abastecido e uma área de armazenamento espaçosa para bagagens. Além disso, uma ampla janela oferece vistas panorâmicas da cidade',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'hotel_id' => 1,
                'name' => '03',
                'description' => 'Para a conveniência dos hóspedes, o quarto também está equipado com uma estação de café e chá, minibar abastecido e uma área de armazenamento espaçosa para bagagens. Além disso, uma ampla janela oferece vistas panorâmicas da cidade',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'hotel_id' => 1,
                'name' => '04',
                'description' => 'Para a conveniência dos hóspedes, o quarto também está equipado com uma estação de café e chá, minibar abastecido e uma área de armazenamento espaçosa para bagagens. Além disso, uma ampla janela oferece vistas panorâmicas da cidade',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'hotel_id' => 2,
                'name' => '05',
                'description' => 'Para a conveniência dos hóspedes, o quarto também está equipado com uma estação de café e chá, minibar abastecido e uma área de armazenamento espaçosa para bagagens. Além disso, uma ampla janela oferece vistas panorâmicas da cidade',
                'created_at' => Carbon::now()
            ]
        ]);

        $this->command->info('Hotels table seeded!');
    }
}
