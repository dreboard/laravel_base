<?php
/**
 * Search Model
 * Search database for requested item from search form
 * or advanced search form.
 * @since v0.1.1
 * @package App\Http\Models
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinException;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class Search
 * @package App\Http\Models
 */
class Search
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
     * Search database from form
     * @param string $version
     * @return mixed
     * @throws UnknownCoinCategoryException
     */
    public function findItem(string $item): array
    {
        $statement = $this->pdo->prepare("call FindSearchItem(:item)");
        $statement->bindValue(':item', str_replace('_', ' ', $item), PDO::PARAM_STR);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_OBJ);
        if (!$coinTypes) {
            throw new UnknownCoinException("Could not get {$item}");
        }
        return $coinTypes;
    }
}
