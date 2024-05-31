<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NoteBookControllerTest extends TestCase
{
    /**
     * Test the index method of the NoteBookController.
     *
     * This function sends a GET request to the '/api/v1/notebook' endpoint
     * and asserts that the response status is 200.
     *
     * @return void
     */
    public function testIndex(): void
    {
        $response = $this->get('/api/v1/notebook');
        $response->assertStatus(200);
    }

    /**
     * Test the store method of the NoteBookController.
     *
     * This function sends a POST request to the '/api/v1/notebook/' endpoint
     * with the provided data and asserts that the response status is 201.
     *
     * @return void
     */
    public function testStore(): void
    {
        $response = $this->post('/api/v1/notebook/', [
            'fio' => 'Ионин Роман Викторович',
            'phone' => '+79999999999',
            'email' => 'jXUyB@example.com',
            'company' => 'ООО Ромашка',
            'birthday' => '2000-01-01',
            'image' => 'https://example.com/image.jpg'
        ]);
        $response->assertStatus(201);
    }

    /**
     * Test the update method of the NoteBookController.
     *
     * This function sends a PATCH request to the '/api/v1/notebook/1' endpoint
     * with the provided data and asserts that the response status is 204.
     *
     * @return void
     */
    public function testUpdate(): void
    {
        $response = $this->patch('/api/v1/notebook/3', [
            'fio' => 'Ионин Роман Викторович',
            'phone' => '+79999999999',
            'email' => 'jXUyB@example.com',
            'company' => 'ООО Ромашка',
            'birthday' => '2000-01-01',
            'image' => 'https://example.com/image.jpg'
        ]);
        $response->assertStatus(204);
    }
    /**
     * Test the destroy method of the NoteBookController.
     *
     * This function sends a DELETE request to the '/api/v1/notebook/1' endpoint
     * and asserts that the response status is 204.
     *
     * @return void
     */
    public function testDestroy(): void
    {
        $response = $this->delete('/api/v1/notebook/1');
        $response->assertStatus(204);
    }

}
