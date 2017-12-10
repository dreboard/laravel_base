<?php
/**
 * Coin Categories Value Object Class
 * The purpose of this class is fill the categories
 * array with the listed properties when using
 * PDO::FetchClass
 * @since 1.0.0
 * @package App\Http\Models
 */

namespace App\Http\Models;

/**
 * Class CoinCategories
 * @package App\Http\Models
 */
class CategoryObject
{
    /** @var int Database primary key */
    protected $coincategoriesID;

    /** @var string Name of category */
    protected $coinCategory;

    /** @var int Number of coins to make complete set */
    protected $completeSet;

    /** @var int Number of subtypes */
    protected $typeCount;

    /** @var float|int $denomination the face value amount */
    protected $denomination;

    /** @var int Number of coins that fit in a roll */
    protected $rollCount;

    /** @var string Actual size of coin large|small */
    protected $coinSize;

    /** @var string Value of coins that fit in a roll */
    protected $rollVal;

    /** @var string Number of coins that fit in a bag */
    protected $bagCount;

    /** @var string Value of coins that fit in a bag */
    protected $bagVal;

    /** @var string Number of coins that fit in a box */
    protected $boxCount;

    /** @var string Value of coins that fit in a box */
    protected $boxVal;

    /** @var string eBay id */
    protected $ebay;

    /**
     * CoinCategories constructor.
     */
    public function __construct()
    {

    }
}
