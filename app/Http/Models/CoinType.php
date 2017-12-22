<?php
/**
 * Coin Type Model.
 * Search database for coin type
 * @since v0.1.1
 * @package App\Http\Models
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

    /**
     * Get Coin Types
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function getYearCoinType(string $coinType, string $year): array
    {
        $statement = $this->pdo->prepare("call CoinTypeAllFromYear(:year, :type)");
        $statement->bindValue(':year', $year, PDO::PARAM_STR);
        $statement->bindValue(':type', $coinType, PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_OBJ);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get types from {$coinType}");
        }
        return $coinTypes;
    }

}