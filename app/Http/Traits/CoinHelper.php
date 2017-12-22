<?php
/**
 * Traits CoinHelper
 * @package Coins\Interfaces
 */
namespace Coins\Traits;

/**
 * Trait CoinHelper
 * @package Coins\Traits
 */
trait CoinHelper
{


    /**
     * @param array $coins
     * @return array
     */
    public function getCommemorativeVersions(array $coins): array
    {

        
    }

    /**
     * Prevent future date
     * @param int $year
     * @return int
     */
    public function getMaxYear(string $year): string
    {
        if ((int)$year > date('Y') || (int)$year < 1793) {
            return date('Y');
        }
        return $year;
    }

}