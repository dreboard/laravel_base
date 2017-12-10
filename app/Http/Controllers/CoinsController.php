<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Models\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use PDO;
use Coins\Exceptions\UnknownCoinException;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CoinsController
{

    /**
     * Create Coin Category Links
     * @param int $coin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCoin(int $coin)
    {
        try {
            if (null === $coin || empty($coin)) {
                throw new UnknownCoinException('Coin not found');
            }

            $pdo = DB::getPdo();
            $statement = $pdo->prepare('call CoinsGetByID(:id)');
            $statement->bindValue(':id', $coin, PDO::PARAM_INT);
            $statement->execute();
            $coinData = $statement->fetch(PDO::FETCH_ASSOC);

            //dd($coinData);
            return view('area.coins.coinview',
                [
                    'coinData' => $coinData
                ]
            );
        } catch (UnknownCoinException | \Throwable $e) {
            $this->typePage();
        }
    }


    public function getThisCategory()
    {

    }


}