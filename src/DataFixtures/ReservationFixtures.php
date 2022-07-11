<?php
/**
 * Reservation fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Reservation;
use App\Entity\Item;
use App\Entity\Status;
/**
 * use App\Entity\Enum\TaskStatus; */
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class ReservationFixtures.
 */
class ReservationFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
{
    /**
     * Load data.
     *
     * @psalm-suppress PossiblyNullPropertyFetch
     * @psalm-suppress PossiblyNullReference
     * @psalm-suppress UnusedClosureParam
     */
    public function loadData(): void
    {
        if (null === $this->manager || null === $this->faker) {
            return;
        }

        $this->createMany(25, 'reservations', function (int $i) {
            $reservation = new Reservation();
            $reservation->setLogin($this->faker->word);
            $reservation->setEmail($this->faker->email);
            $reservation->setComment($this->faker->sentence(5));

            /** @var Item $item */
            $item = $this->getRandomReference('items');
            $reservation->setItem($item);

            /** @var Status $status */
            $status = $this->getRandomReference('statuses');
            $reservation->setStatus($status);

            return $reservation;
        });

        $this->manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on.
     *
     * @return string[] of dependencies
     *
     * @psalm-return array{0: CategoryFixtures::class}
     */
    public function getDependencies(): array
    {
        return [CategoryFixtures::class];
    }
}