<?php

namespace Tests\Unit;

use Tests\TestCase;

class RoomsTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_post_hotels()
    {
        $response = $this->post('/rooms/store', [
            'hotel_id' => 1,
            'name' => '01',
            'description' => 'description',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('rooms', [
            'hotel_id' => 1,
            'name' => '01',
            'description' => 'description',
        ]);
    }

    /** @test */
    // public function hotels_dataset_registers_test()
    // {
    //     $response = $this->post('/rooms/create', []);

    //     $response->assertSessionHasErrors(['hotel_id', 'name', 'description']);
    // }
}
