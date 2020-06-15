<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitTest extends TestCase
{
    /**
     * @var array
     */
    protected $unitStatuses = [
        'available',
        'charging'
    ];



    public function testGetStatusAttribute()
    {
        //TO DO
    }
}
