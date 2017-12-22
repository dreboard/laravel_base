<?php

namespace Tests\Unit;

use App\Http\Controllers\CoinsController;
use App\Http\Models\Coin;
use Coins\Exceptions\UnknownCoinException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CoinTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->coin = new Coin();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     * @covers Coin::getCoinByID
     * @return void
     */
    public function testGetCoinID()
    {
        $statement = $this->coin->getCoinByID(11);
        $this->assertArrayHasKey('coinID', $statement);
    }

    /**
     * @covers CoinsController::getCoin
     */
    public function testCantGetCoin() {
        $this->expectException(UnknownCoinException::class);
        $exception = $this->coin->getCoinByID(-1);
        $response = $this->get('/getCoin');
        $response->assertRedirect('/error');
    }
}
