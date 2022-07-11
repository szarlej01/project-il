<?php
/**
 * Reservation service.
 */

namespace App\Service;

use App\Repository\ItemRepository;
use App\Repository\ReservationRepository;
use App\Entity\Reservation;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Class ReservationService.
 */
class ReservationService implements ReservationServiceInterface
{
    /**
     * Reservation repository.
     */
    private ReservationRepository $reservationRepository;

    /**
     * Save entity.
     *
     * @param Reservation $reservation Reservation entity
     */
    public function save(Reservation $reservation): void
    {
        $this->reservationRepository->save($reservation);
    }

}