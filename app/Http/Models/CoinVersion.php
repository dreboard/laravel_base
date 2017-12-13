<?php
/**
 * CoinVersion Model.
 * Search database for coin version
 * @since v0.1.1
 * @package App\Http\Models
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinCategoryException;
use Coins\Interfaces\CoinInterface;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinVersion
 * @package App\Http\Models
 */
class CoinVersion implements CoinInterface
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
    public function getCoinVersions(string $version): array
    {
        $statement = $this->pdo->prepare("call VersionGetAll(:ver)");
        $statement->bindValue(':ver', str_replace('_', ' ', $version), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinCategoryException("Could not get types from {$category}");
        }
        return $coinTypes;
    }

    /**
     * Get Category for this type
     * @param $type
     * @return string
     */
    public function getThisCategory(string $version): string
    {
        $statement = $this->pdo->prepare("call VersionGetCategory(:cat)");
        $statement->bindValue(':cat', str_replace('_', ' ', $version), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }

    /**
     * Get Category for this type
     * @param $type
     * @return string
     */
    public function getThisType(string $version): string
    {
        $statement = $this->pdo->prepare("call VersionGetType(:cat)");
        $statement->bindValue(':cat', str_replace('_', ' ', $version), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }
}
