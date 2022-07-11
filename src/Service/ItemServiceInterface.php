<?php
/**
 * Item service interface.
 */

namespace App\Service;


use Knp\Component\Pager\Pagination\PaginationInterface;
use App\Entity\Item;
use App\Entity\User;
use Knp\Component\Pager\Pagination\SlidingPagination;


/**
 * Interface ItemServiceInterface.
 */
interface ItemServiceInterface
{
    /**
     * Get paginated list.
     *
     * @param int                $page    Page number
     * @param array<string, int> $filters Filters array
     *
     * @return PaginationInterface<SlidingPagination> Paginated list
     */
    public function getPaginatedList(int $page, array $filters = []): PaginationInterface;
    /**
     * Save entity.
     *
     * @param Item $item Item entity
     */
    public function save(Item $item): void;

    /**
     * Delete entity.
     *
     * @param Item $item Item entity
     */
    public function delete(Item $item): void;
}
