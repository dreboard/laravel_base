<?php
/**
 * Coin Type Model.
 * Search database for coin type
 * @since v0.1.1
 */
namespace App\Http\Models;

use Coins\Exceptions\CollectionException;
use Coins\Exceptions\NotUsersCoinException;
use Coins\Exceptions\UnknownCoinException;
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
     * Save users coin
     * @param array $details
     * @return mixed
     * @throws CollectionException
     */
    public function saveCoin(array $details): array
    {
        $statement = $this->pdo->prepare(
            'call CollectionSaveCoin(
            :holed, 
            :cleaned, 
            :altered, 
            :damaged, 
            :pvc, 
            :corrosion, 
            :bent, 
            :plugged, 
            :polished, 
            :collectionID, 
            :id
            )'
        );
        $statement->bindValue(':holed', $details['holed'], PDO::PARAM_INT);
        $statement->bindValue(':cleaned', $details['cleaned'], PDO::PARAM_INT);
        $statement->bindValue(':altered', $details['altered'], PDO::PARAM_INT);
        $statement->bindValue(':damaged', $details['damaged'], PDO::PARAM_INT);
        $statement->bindValue(':pvc', $details['pvc'], PDO::PARAM_INT);
        $statement->bindValue(':corrosion', $details['corrosion'], PDO::PARAM_INT);
        $statement->bindValue(':bent', $details['bent'], PDO::PARAM_INT);
        $statement->bindValue(':plugged', $details['plugged'], PDO::PARAM_INT);
        $statement->bindValue(':plugged', $details['plugged'], PDO::PARAM_INT);
        $statement->bindValue(':polished', $details['polished'], PDO::PARAM_INT);
        $statement->bindValue(':collectionID', $details['collectionID'], PDO::PARAM_INT);
        $statement->bindValue(':userID', Auth::id(), PDO::PARAM_INT);
        $save = $statement->execute();
        if (!$save) {
            throw new CollectionException("Could not save coin");
        }

        return $coinTypes[0];
    }
    
    /**
     * Get Coin
     * @param string $coinType
     * @return mixed
     * @throws NotUsersCoinException
     */
    public function getCollectedCoin(int $collectionID): array
    {
        $statement = $this->pdo->prepare("call CollectionGetCoin(:coin, :user)");
        $statement->bindValue(':coin', $collectionID, PDO::PARAM_INT);
        $statement->bindValue(':user', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $collected = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($collected && ($collected[0]['userID'] !== Auth::id())) {
            throw new NotUsersCoinException("Could not get coin");
        }
        return $collected[0];
    }

    /**
     * @param int $coinID
     * @return array
     * @throws NotUsersCoinException
     */
    public function getCollectedCoinByID(int $coinID):array
    {
        $statement = $this->pdo->prepare("call CollectionGetCoinsByID(:coin, :user)");
        $statement->bindValue(':coin', $coinID, PDO::PARAM_INT);
        $statement->bindValue(':user', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $collected = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($collected && ($collected[0]['userID'] !== Auth::id())) {
            throw new NotUsersCoinException("Could not get coin");
        }
        return $collected;
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
     * @param array $damages
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function saveDamages($damages): array
    {
        $statement = $this->pdo->prepare(
            'call CollectionUpdateCoinDamage(
            :holed, 
            :cleaned, 
            :altered, 
            :damaged, 
            :pvc, 
            :corrosion, 
            :bent, 
            :plugged, 
            :polished, 
            :collectionID, 
            :id
            )'
        );
        $statement->bindValue(':holed', $damages['holed'], PDO::PARAM_INT);
        $statement->bindValue(':cleaned', $damages['cleaned'], PDO::PARAM_INT);
        $statement->bindValue(':altered', $damages['altered'], PDO::PARAM_INT);
        $statement->bindValue(':damaged', $damages['damaged'], PDO::PARAM_INT);
        $statement->bindValue(':pvc', $damages['pvc'], PDO::PARAM_INT);
        $statement->bindValue(':corrosion', $damages['corrosion'], PDO::PARAM_INT);
        $statement->bindValue(':bent', $damages['bent'], PDO::PARAM_INT);
        $statement->bindValue(':plugged', $damages['plugged'], PDO::PARAM_INT);
        $statement->bindValue(':plugged', $damages['plugged'], PDO::PARAM_INT);
        $statement->bindValue(':polished', $damages['polished'], PDO::PARAM_INT);
        $statement->bindValue(':collectionID', $damages['collectionID'], PDO::PARAM_INT);
        $statement->bindValue(':userID', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $coinUpdate = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinUpdate) {
            throw new UnknownCoinTypeException("Could not get coin");
        }

        return $coinTypes[0];
    }

}