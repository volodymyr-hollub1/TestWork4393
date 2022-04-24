<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoreTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    protected function getHeaders(): array
    {
        return ['X-CUSTOM-APIKEY' => config('app.api_key')];
    }
}
