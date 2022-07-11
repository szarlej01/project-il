<?php
/**
 * Status fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Status;
use DateTimeImmutable;

/**
 * Class StatusFixtures.
 *
 * @psalm-suppress MissingConstructor
 */
class StatusFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @psalm-suppress PossiblyNullReference
     * @psalm-suppress UnusedClosureParam
     */
    public function loadData(): void
    {
        $this->createMany(4, 'statuses', function (int $i) {
            $status = new Status();
            $status->setName($this->faker->unique()->word);

            return $status;
        });

        $this->manager->flush();
    }
}