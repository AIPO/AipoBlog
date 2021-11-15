<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommunityTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function testListOfMyCommunities()
    {
        //create user//load communities list
        $user = User::withcount('communities')->has('communities')->first();
        //login with that user
        auth()->login($user);
        //create community
        $response = $this->get('/communities');
        //check community
        $response->assertStatus(200);
        $this->assertContains($user->communities[0]->title);
    }

    public function testCreateCommunity()
    {
        $name = 'some name';
        $description ='some descriptions';
        $user = User::first();
        //login with that user
        auth()->login($user);
        $response = $this->post('/communities', [
            'name' => $name,
            'description' => $description,
        ]);
        $response->assertStatus(302);
        $this->assertStringContainsString($name, $response->getContent());
    }
}
