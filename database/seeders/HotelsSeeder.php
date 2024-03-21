<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hotels')->insert([
            [
                'id' => 1,
                'name' => 'Ibis budget',
                'address' => 'Av. Brás de Aguiar',
                'city' => 'Belém',
                'state' => 'PA',
                'zip_code' => '66035000',
                'website' => 'sitehotel.com.br',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Holiday Express',
                'address' => 'Av. Brás de Aguiar',
                'city' => 'Belém',
                'state' => 'PA',
                'zip_code' => '66035000',
                'website' => 'sitehotel.com.br',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Radisson Hotel',
                'address' => 'Av. Brás de Aguiar',
                'city' => 'Belém',
                'state' => 'PA',
                'zip_code' => '66035000',
                'website' => 'sitehotel.com.br',
                'created_at' => Carbon::now()
            ]
        ]);

        $this->command->info('Hotels table seeded!');
    }
}
