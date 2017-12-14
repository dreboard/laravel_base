<?php
/**
 * CoinMetal Model.
 * Search database for coin Metal
 * @since v0.1.3
 * @package App\Http\Models
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinCategoryException;
use Coins\Interfaces\CoinInterface;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinMetal
 * @package App\Http\Models
 */
class CoinMetal
{

    /**
     * @var
     */
    protected $pdo;

    /**
     * CoinMetal constructor.
     */
    public function __construct()
    {
        $this->pdo = DB::getPdo();
    }



    /**
     * Get all coins by metal
     * @param string $metal
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function getCoinMetal(string $metal): array
    {
        $statement = $this->pdo->prepare("call MetalGetAll(:metal)");
        $statement->bindValue(':metal', str_replace('_', ' ', $metal), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinCategoryException("Could not get types from {$metal}");
        }
        return $coinTypes;
    }

    /**
     * Get Category for this metal
     * @param string $metal
     * @return array
     */
    public function getMetalCategories(string $metal): array
    {
        $statement = $this->pdo->prepare("call MetalCoinCategory(:metal)");
        $statement->bindValue(':metal', str_replace('_', ' ', $metal), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get Category for this design
     * @param string $metal
     * @return array
     */
    public function getMetalTypes(string $metal): array
    {
        $statement = $this->pdo->prepare("call MetalCoinTypes(:metal)");
        $statement->bindValue(':metal', str_replace('_', ' ', $metal), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
