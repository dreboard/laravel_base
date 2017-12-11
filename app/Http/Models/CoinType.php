<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 12/3/2017
 * Time: 4:06 AM
 */

namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinTypeException;
use Illuminate\Support\Facades\DB;
use PDO;

class CoinType
{

    /**
     * @var
     */
    protected $pdo;

    /**
     * CoinCategory constructor.
     */
    public function __construct()
    {
        $this->pdo = DB::getPdo();
    }
    /**
     * Get Coin Types
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function getCoinType(string $coinType): array
    {
        $statement = $this->pdo->prepare("call CoinTypeGetAll(:type)");
        $statement->bindValue(':type', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_OBJ);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get types from {$coinType}");
        }
        return $coinTypes;
    }

}