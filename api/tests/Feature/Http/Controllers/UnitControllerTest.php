<?php

namespace App\Http\Controllers;
use App\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Charge;

class UnitControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $unit;


    public function setUp():void
    {
        parent::setUp();

        $this->unit = factory(Unit::class)
            ->create();

        $this->unit->charges()->createMany(
            factory(Charge::class, 3)->make()->toArray()
        );

    }
    /**
     * test index get all records
     */
    public function testIndex()
    {

        $this->get(route('units.index'))
            ->assertStatus(200);
    }

    /**
     * get unit by id
     */
    public function testShow()
    {

        $this->get(route('units.show', $this->unit->id))
            ->assertStatus(200);
    }
}
