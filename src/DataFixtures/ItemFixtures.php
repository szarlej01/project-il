<?php
/**
 * Item fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Category;
/**
 * use App\Entity\Enum\TaskStatus;
use App\Entity\Tag;
 */
use App\Entity\Item;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class ItemFixtures.
 */
class ItemFixtures extends AbstractBaseFixtures implements DependentFixtureInterface
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

        $this->createMany(20, 'items', function (int $i) {
            $item = new Item();
            $item->setTitle($this->faker->unique()->word);
            $item->setAuthor($this->faker->unique()->name);
            $item->setAddTime(
                DateTimeImmutable::createFromMutable(
                    $this->faker->dateTimeBetween('-100 days', '-1 days')
                )
            );
            $item->setQuantity($this->faker->numberBetween(1,8));

            /** @var Category $category */
            $category = $this->getRandomReference('categories');
            $item->setCategory($category);

            return $item;
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