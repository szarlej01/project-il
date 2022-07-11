<?php
/**
 * Reservation service interface.
 */

namespace App\Service;


use App\Entity\Reservation;
use App\Entity\User;


/**
 * Interface ReservationServiceInterface.
 */
interface ReservationServiceInterface
{
    /**
     * Save entity.
     *
     * @param Reservation $reservation Reservation entity
     */
    public function save(Reservation $reservation): void;

}
