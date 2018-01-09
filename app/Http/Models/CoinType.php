<?php
/**
 * Coin Type Model.
 * Search database for coin type
 * @since v0.1.1
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinTypeException;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinType
 * @package App\Http\Models
 */
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
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get coins from {$coinType}");
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
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get years from {$coinType}");
        }
        return $coinTypes;
    }


    /**
     * Get Coin Types
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function getYearList(string $coinType): array
    {
        $statement = $this->pdo->prepare("call CoinTypeDistinctYears(:type)");
        $statement->bindValue(':type', $coinType, PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_COLUMN);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get year list from {$coinType}");
        }
        return $coinTypes;
    }

    /**
     * Get Coin Type Design Types
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function getDesignsList(string $coinType): array
    {
        $statement = $this->pdo->prepare("call CoinGetDesignByType(:type)");
        $statement->bindValue(':type', $coinType, PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_COLUMN);
        if (!$coinTypes) {
            return [0 => 'None'];
            //throw new UnknownCoinTypeException("Could not get getDesignsList from {$coinType}");
        }
        return $coinTypes;
    }

    /**
     * Get Coin Type Design Types
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function getDesignTypesList(string $coinType): array
    {
        $statement = $this->pdo->prepare("call CoinGetDesignTypeByCoinType(:type)");
        $statement->bindValue(':type', $coinType, PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_COLUMN);
        if (!$coinTypes) {
            return [0 => 'None'];
            //throw new UnknownCoinTypeException("Could not get getDesignTypesList from {$coinType}");
        }
        return $coinTypes;
    }

}