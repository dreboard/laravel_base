<?php
namespace Coins\Interfaces;

/**
 * interface CollectionInterface
 * @package Coins\Interfaces
 */
interface CollectionInterface
{
    /**
     * Get by this id
     * @param int $id
     * @return array
     */
    public function getById(int $id): array;

}