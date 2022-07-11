<?php
/**
 * Item entity.
 */

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

/**
 * Class Task.
 *
 * @psalm-suppress MissingConstructor
 */
#[ORM\Entity(repositoryClass: ItemRepository::class)]
#[ORM\Table(name: 'items')]
class Item
{
    /**
     * Primary key.
     *
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    /**
     * Title.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 64)]
    private ?string $title = null;

    /**
     * Author.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 64)]
    private ?string $author = null;

    /**
     * AddTime.
     *
     * @var DateTimeImmutable|null
     *
     * @psalm-suppress PropertyNotSetInConstructor
     */
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeImmutable $addTime;

    /**
     * Quantity.
     *
     * @var integer|null
     */
    #[ORM\Column(type: 'integer')]
    private ?int $quantity = null;

    /**
     * @var Reservation|null|Collection
     */
    #[ORM\OneToMany(mappedBy: 'item', targetEntity: Reservation::class)]
    private Reservation|null|Collection $reservations;

    /**
     * Category.
     * @var Category|null
     */
    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'item')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    /**
     * Getter for Id.
     *
     * @return int|null Id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for title.
     *
     * @return string|null Title
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Setter for title.
     *
     * @param string|null $title Title
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Getter for author.
     *
     * @return string|null Author
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Setter for Author.
     *
     * @param string|null $author Author
     */
    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Getter for addTime.
     *
     * @return DateTimeImmutable|null Created at
     */
    public function getAddTime(): ?\DateTimeInterface
    {
        return $this->addTime;
    }

    /**
     * Setter for addTime.
     *
     * @param DateTimeImmutable|null $addTime addTime.
     */
    public function setAddTime(?DateTimeImmutable $addTime): self
    {
        $this->addTime = $addTime;

        return $this;
    }

    /**
     * Getter for quantity.
     *
     * @return int|null Quantity
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * Setter for quantity.
     *
     * @param int|null $quantity Quantity.
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    /**
     * AddReservation Function
     * @param Reservation $reservation
     * @return $this
     */
    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setItem($this);
        }

        return $this;
    }

    /**
     * RemoveReservation Function
     * @param Reservation $reservation
     * @return $this
     */
    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getItem() === $this) {
                $reservation->setItem(null);
            }
        }

        return $this;
    }

    /**
     * Getter for Category.
     *
     * @return Category|null Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Setter for Category.
     *
     * @param Category|null $category Category.
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
