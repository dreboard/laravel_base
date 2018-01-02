<?php
/**
 * Coin Type Model.
 * Search database for coin type
 * @since v0.1.1
 */
namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinTypeException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinType
 * @package App\Http\Models
 */
class Collection
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
    public function getCollectedCoin(int $collectionID): array
    {
        $statement = $this->pdo->prepare("call CollectionGetCoin(:coin, :user)");
        $statement->bindValue(':coin', $collectionID, PDO::PARAM_INT);
        $statement->bindValue(':user', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get coin");
        }
        return $coinTypes[0];
    }

    /**
     * Get Coin Types
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function updateCoinDetails(
        int $val,
        string $col,
        int $collectionID
    ): array
    {
        $statement = $this->pdo->prepare('call CollectionUpdateCoinDetails(:val, :col, :userID, :coin)');
        $statement->bindValue(':val', $val, PDO::PARAM_STR);
        $statement->bindValue(':col', $col, PDO::PARAM_STR);
        $statement->bindValue(':coin', $collectionID, PDO::PARAM_INT);
        $statement->bindValue(':userID', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get coin");
        }
        return $coinTypes[0];
    }


    /**
     * Get Coin Types
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function saveDamages($holed, $cleaned, $altered, $damaged, $pvc, $corrosion, $bent, $plugged, $polished): array
    {
        $statement = $this->pdo->prepare('call CollectionUpdateCoinDamage(:val, :col, :userID, :coin)');
        $statement->bindValue(':val', $val, PDO::PARAM_INT);
        $statement->bindValue(':col', $col, PDO::PARAM_INT);
        $statement->bindValue(':coin', $collectionID, PDO::PARAM_INT);
        $statement->bindValue(':userID', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get coin");
        }
        return $coinTypes[0];
    }

}