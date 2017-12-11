<?php
/**
 * Class SubCategory
 * @package App\Http\Models
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinCategoryException;
use Coins\Interfaces\CoinInterface;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinCategory
 * @package App\Http\Models
 */
class SubCategory implements CoinInterface
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
     * Get Version by name
     * @param string $version
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function getSubCategory(string $subCategory): array
    {
        $statement = $this->pdo->prepare("call SubCategoryGetAll(:sub)");
        $statement->bindValue(':sub', str_replace('_', ' ', $subCategory), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinCategoryException("Could not get types from {$subCategory}");
        }
        return $coinTypes;
    }

    /**
     * Get Category for this type
     * @param $type
     * @return string
     */
    public function getThisCategory(string $subCategory): string
    {
        $statement = $this->pdo->prepare("call SubCategoryGetCategory(:sub)");
        $statement->bindValue(':sub', str_replace('_', ' ', $subCategory), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }

    /**
     * Get Category for this type
     * @param $type
     * @return string
     */
    public function getThisType(string $subCategory): string
    {
        $statement = $this->pdo->prepare("call SubCategoryGetType(:sub)");
        $statement->bindValue(':sub', str_replace('_', ' ', $subCategory), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }
}
