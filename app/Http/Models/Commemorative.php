<?php
/**
 * Commemorative Model.
 * Search database for coin Commemorative
 * @since v0.1.4
 * @package App\Http\Models
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinCategoryException;
use Coins\Interfaces\CoinInterface;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class Commemorative
 * @package App\Http\Models
 */
class Commemorative
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
     * Get all commemoratives
     * @return array
     */
    public function getAll(): array
    {
        $statement = $this->pdo->prepare("call CommemorativeGetAll()");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all commemoratives coinTypes
     * @return array
     */
    public function getAllTypes(): array
    {
        $statement = $this->pdo->prepare("call CommemorativeGetTypes()");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all commemoratives coinCategories
     * @return array
     */
    public function getAllCats(): array
    {
        $statement = $this->pdo->prepare("call CommemorativeGetCats()");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get all commemoratives coinCategories
     * @param string $type
     * @return array
     */
    public function getAllVersions(string $type): array
    {
        $statement = $this->pdo->prepare("call CommemorativeGetVersionTypes(type)");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
