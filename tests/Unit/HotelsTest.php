<?php

namespace Tests\Unit;

use App\Models\Hotels;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class HotelsTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    public function test_post_hotels()
    {
        $response = $this->post('/hotels/store', [
            'name' => 'Holiday Express',
            'address' => 'Av. Brás de Aguiar',
            'city' => 'Belém',
            'state' => 'PA',
            'zip_code' => '66035000',
            'website' => 'sitehotel.com.br'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('hotels', [
            'name' => 'Holiday Express',
            'address' => 'Av. Brás de Aguiar',
            'city' => 'Belém',
            'state' => 'PA',
            'zip_code' => '66035000',
            'website' => 'sitehotel.com.br'
        ]);
    }

    /** @test */
    // public function hotels_dataset_registers_test()
    // {
    //     $response = $this->post('/hotels/store', []);
    //     dd($response);

    //     $response->assertSessionHasErrors(['name', 'address', 'city', 'state', 'zip_code', 'website']);
    // }
}
