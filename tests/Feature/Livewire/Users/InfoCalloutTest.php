<?php

namespace Tests\Feature\Livewire\Users;

use App\Livewire\Users\InfoCallout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class InfoCalloutTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(InfoCallout::class)
            ->assertStatus(200);
    }
}
