<?php

namespace App\Http\Models;

use Coins\Exceptions\UnknownCoinException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;
use App\Http\Models\CoinObject;
/**
 * Class Coin
 * @package App\Http\Models
 */
class Coin extends Model
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
     * Get coin by ID
     * @param int $coin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCoinByID(int $coin)
    {
        if (null === $coin || empty($coin)) {
            throw new UnknownCoinException('Coin not found');
        }

        $statement = $this->pdo->prepare('call CoinsGetByID(:id)');
        $statement->bindValue(':id', $coin, PDO::PARAM_INT);
        $statement->execute();
        $coinData = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$coinData) {
            throw new UnknownCoinException('Coin not found');
        }
        return $coinData;
    }

    /**
     * @param int $coin
     * @return mixed
     * @throws UnknownCoinException
     */
    public function getCoin(int $coin)
    {
        if (null === $coin || empty($coin)) {
            throw new UnknownCoinException('Coin not found');
        }

        $stmt = $this->pdo->prepare('call CoinsGetByID(:id)');
        $stmt->bindValue(':id', 11, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'CoinObject', [$coin]);
        $obj = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$obj) {
            throw new UnknownCoinException('Coin not found');
        }
        return $obj;
    }
    /**
     * @param string $year
     * @return array
     * @throws UnknownCoinException
     */
    public function getAllFromYear(string $year): array
    {
        if (null === $year || empty($year)) {
            throw new UnknownCoinException('Coin not found');
        }
        $statement = $this->pdo->prepare('call CoinGetAllFromYear(:year)');
        $statement->bindValue(':year', $year, PDO::PARAM_INT);
        $statement->execute();
        $coinData = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$coinData) {
            throw new UnknownCoinException('Year not found');
        }
        return $coinData;
    }

    /**
     * Get by year and type mint marks
     * @param string $year
     * @param string $type
     * @return array
     * @throws UnknownCoinException
     */
    public function yearMintMarks(int $year, string $type): array
    {
        $statement = $this->pdo->prepare('call CoinMintMarksFromYear(:year, :type)');
        $statement->bindValue(':year', $year, PDO::PARAM_INT);
        $statement->bindValue(':type', $type, PDO::PARAM_STR);
        $statement->execute();
        $coinData = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$coinData) {
            throw new UnknownCoinException('Year not found');
        }
        return $coinData;
    }
}
