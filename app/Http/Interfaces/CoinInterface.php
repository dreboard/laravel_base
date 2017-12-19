<?php
namespace Coins\Interfaces;

/**
 * Interface CoinInterface
 * @package Coins\Interfaces
 */
interface CoinInterface
{

    /**
     * Get this category
     * @param string $value
     * @return string
     */
    public function getThisCategory(string $value): string;

    /**
     * Get this type
     * @param string $value
     * @return string
     */
    public function getThisType(string $value): string;

}