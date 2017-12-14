<?php
/**
 * Class CoinCategory
 * @package App\Http\Models
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinCategoryException;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinCategory
 * @package App\Http\Models
 */
class CoinCategory
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
     * Get all coins by Category
     * @param string $category
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function getCoinCategory(string $category): array
    {
        $statement = $this->pdo->prepare("call CategoryGetAll(:category)");
        $statement->bindValue(':category', str_replace('_', ' ', $category), PDO::PARAM_STR);
        $statement->execute();
        $coins = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coins) {
            throw new UnknownCoinCategoryException("Could not get coins from {$category}");
        }
        return $coins;
    }

    /**
     * Get Category Distinct Types
     * @param string $category
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function getTypesByCategory(string $category): array
    {
        $statement = $this->pdo->prepare("call CategoryDistinctTypes(:cat)");
        //$statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue(':cat', str_replace('_', ' ', $category), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
        if (!$coinTypes) {
            throw new UnknownCoinCategoryException("Could not get types from {$category}");
        }
        return $coinTypes;
    }

    /**
     * Get all category details
     * @param string $category
     * @return array
     * @throws UnknownCoinCategoryException
     */
    public function getCategoryDetails(string $category):array
    {
        $catDetails = $this->pdo->prepare("call CategoryGetDetails(:cat)");
        $catDetails->setFetchMode(\PDO::FETCH_CLASS, CategoryObject::class);
        $catDetails->bindValue(':cat', str_replace('_', ' ', $category), PDO::PARAM_STR);
        $catDetails->execute();
        $catObj = $catDetails->fetch();
        if (!$catObj) {
            throw new UnknownCoinCategoryException("{$category} types not found");
        }
        return $catObj;
    }

}