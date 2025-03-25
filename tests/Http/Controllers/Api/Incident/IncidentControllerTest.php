<?php

namespace Tests\Http\Controllers\Api\Incident;

use App\Http\Controllers\Api\Incident\IncidentController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class IncidentControllerTest extends TestCase
{

    public function testNotification()
    {

        $data = [
            'device_uuid' => 'ec5cb81a-40d2-46da-8ccf-3151424d301e',
            'priority' => 'high',
            'transcript' => 'yarrağımı yemek tatlı geldi demi',
            'human_count' => 2,
            'bad_words' => ['yavşak', 'salak'],
            'additional' => [
                'details' => 'Fall detected near room 12. Patient unresponsive.'
            ]
        ];


        $response = $this->postJson('http://0.0.0.0:8000/api/v1/notifications/incident', $data);


        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'Notification received successfully.',
        ]);
    }
}
