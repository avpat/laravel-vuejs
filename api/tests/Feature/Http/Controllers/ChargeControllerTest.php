<?php


namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Unit;
use App\Charge;

class ChargeControllerTest extends TestCase
{

    use RefreshDatabase;

    protected $unit;


    public function setUp():void
    {
        parent::setUp();

        $this->unit = factory(Unit::class)
            ->create();

        $this->unit->charges()->createMany(
            factory(Charge::class, 1)->make()->toArray()
        );

    }

    public function testUpdate()
    {

        $formData = [
            'end'      => Carbon::now()->format('Y-m-d H:m:s'),
            '_method'   => 'patch',
        ];

        $this->withExceptionHandling();

        $chargeId = $this->unit->charges()->first()->pluck('id');

        $this->json('POST', route('charge.update', ['unitId' => $this->unit->id, 'chargeId' => $chargeId[0]]), $formData)
            ->assertStatus(200);
    }

    public function testStore()
    {

    }
}
