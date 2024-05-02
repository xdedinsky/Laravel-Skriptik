<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CodeCompilationTest extends TestCase
{
    /** @test */
    public function user_can_submit_cpp_code_for_compilation()
    {
        // Mocked data to simulate user input
        $payload = [
            'code' => '#include <iostream>
                        using namespace std;

                        int main() {
                        cout << "Hello World!";
                        return 0;
                        } ',
            'language' => 'cpp',
            'input' => ''
        ];
        $headers = [
            'Content-Type' => 'application/json',
        ];
        $response = $this->postJson('http://localhost:3000/', $payload, $headers);
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'output' => 'Hello World!'
        ]);
        dump($response->getContent());

    }
}

