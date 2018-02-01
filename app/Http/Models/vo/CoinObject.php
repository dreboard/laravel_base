<?php

namespace App\Http\Models;

/**
 * Coin Value Object.
 * Represents an object taken from the coins table
 * This class is immutable.
 */

/**
 * Class CoinObject
 * @package App\Http\Models
 */
final class CoinObject
{
    private $coinID;
    private $mintMark;
    private $coinCategory;
    private $coinSubCategory;
    private $coinType;
    private $coinName;
    private $byMint;
    private $coinVersion;
    private $century;
    private $strike;
    private $commemorative;
    private $commemorativeType;
    private $commemorativeVersion;
    private $series;
    private $seriesType;
    private $design;
    private $designType;
    private $denomination;
    private $keyDate;
    private $coinYear;
    private $byMintGold;
    private $errorCoin;
    private $coinMetal;
    private $varietyType;
    private $varietyCoin;
    private $obverse;
    private $reverse;
    private $snow;
    private $ddr;
    private $ddo;
    private $wddr;
    private $wddo;
    private $mintmarkStage;
    public $nickname;

    /**
     * Constructor.
     */
    public function __construct(int $coin)
    {
        $this->coinID = $coin;
        $this->nickname = 'Penny';
    }

    /**
     * @param $key
     * @param $val
     */
    public function __set($prop, $val)
    {
        $this->{$prop} = $val;
    }

    /**
     * @param $prop
     * @return bool
     */
    public function __get($prop)
    {
        return $prop ?? false;
    }
}