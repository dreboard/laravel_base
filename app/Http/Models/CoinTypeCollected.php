<?php
/**
 * Coin Type Collected Model.
 * Search database for coin types collected by user
 * @since v0.1.1
 */
namespace App\Http\Models;

use Coins\Exceptions\{UnknownCoinTypeException, NotUsersCoinException};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class CoinTypeCollected
 * @package App\Http\Models
 */
class CoinTypeCollected
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
     * Get Coin Types Collected by user
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function getCoinTypeCollected(string $coinType)
    {
        if (!$coinType) {
            throw new UnknownCoinTypeException("Could not get types from {$coinType}");
        }
        $statement = $this->pdo->prepare("call CoinTypeGetAllCollected(:type, :id)");
        $statement->bindValue(':type', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $statement->bindValue(':id', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (!$coinTypes) {
            return false;
        }
        return $coinTypes;
    }

    /**
     * Get Coin Types Collected by user
     * @param string $coinType
     * @return mixed
     * @throws UnknownCoinTypeException
     */
    public function getCoinTypeColors(string $color, string $coinType)
    {
        if (!$coinType) {
            throw new UnknownCoinTypeException("Could not get types from {$coinType}");
        }
        $statement = $this->pdo->prepare("call CoinGetColorCountByTypeCollected(:color, :type, :id)");
        $statement->bindValue(':color', str_replace('_', ' ', $color), PDO::PARAM_STR);
        $statement->bindValue(':type', str_replace('_', ' ', $coinType), PDO::PARAM_STR);
        $statement->bindValue(':id', Auth::id(), PDO::PARAM_INT);
        $statement->execute();
        $coinTypes = $statement->fetchColumn();
        if (!$coinTypes) {
            return 0;
        }
        return $coinTypes;
    }

    /**
     * @param string $coinType
     * @return array
     * @throws UnknownCoinTypeException
     */
    public function getColorsArray(string $coinType):array
    {
        $red = $this->getCoinTypeColors('RD', $coinType);
        $redBrown = $this->getCoinTypeColors('RB', $coinType);
        $brown = $this->getCoinTypeColors('BN', $coinType);
        $none = $this->getCoinTypeColors('None', $coinType);
        return ['red' => $red, 'redBrown' => $redBrown, 'brown' => $brown, 'none' => $none];
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
        $coinTypes = $statement->fetchAll(PDO::FETCH_OBJ);
        if (!$coinTypes) {
            throw new UnknownCoinTypeException("Could not get types from {$coinType}");
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
            throw new UnknownCoinTypeException("Could not get types from {$coinType}");
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

    /**
     * Recent last five collected
     * @param string $category
     * @param int $userID
     * @return mixed
     */
    public function typeLastCountByUser(string $category)
    {
        try{
            $pdo = DB::getPdo();
            $statement = $pdo->prepare("call CoinTypeLastFiveByUser(:cat, :id)");
            $statement->bindValue(':cat', str_replace('_', ' ', $category), PDO::PARAM_STR);
            $statement->bindValue(':id', Auth::id(), PDO::PARAM_INT);
            $statement->execute();
            $coinTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (!$coinTypes) {
                return false;
                return [0 => 'None'];
                //throw new UnknownCoinTypeException("Could not get types from {$category}");
            }
            return $coinTypes;
        }catch (\PDOException | Throwable $e){
            return $e->getMessage();
        }
    }

}