<?php
/**
 * CoinDesign Model.
 * Search database for coin version
 * @since v0.1.2
 * @package App\Http\Models
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinCategoryException;
use Coins\Interfaces\CoinInterface;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinDesign
 * @package App\Http\Models
 */
class CoinDesign
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
     * Get all coins by design
     * @param string $design
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function getCoinDesign(string $design): array
    {
        $statement = $this->pdo->prepare("call DesignGetAll(:design)");
        $statement->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinCategoryException("Could not get getCoinDesign from {$design}");
        }
        return $coinTypes;
    }

    /**
     * Get all coins by design
     * @param string $design
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function getCoinDesignType(string $design): array
    {
        $statement = $this->pdo->prepare("call DesignTypeGetAll(:design)");
        $statement->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinCategoryException("Could not get getCoinDesignType from {$design}");
        }
        return $coinTypes;
    }

    /**
     * Get Category for this design
     * @param string $design
     * @return array
     */
    public function getDesignCategories(string $design): array
    {
        $statement = $this->pdo->prepare("call DesignCoinCategory(:design)");
        $statement->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get Category for this design
     * @param string $design
     * @return array
     */
    public function getDesignTypes(string $design): array
    {
        $statement = $this->pdo->prepare("call DesignCoinTypes(:design)");
        $statement->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all coins by design
     * @param string $design
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function getCoinTypeFromDesign(string $design): array
    {
        $statement = $this->pdo->prepare("call DesignGetCoinType(:design)");
        $statement->bindValue(':design', str_replace('_', ' ', $design), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_COLUMN);
        if (!$coinTypes) {
            throw new UnknownCoinCategoryException("Could not get getCoinDesign from {$design}");
        }
        return $coinTypes;
    }
}
