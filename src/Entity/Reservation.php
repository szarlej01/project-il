<?php

/**
 * Reservation entity.
 */
namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[ORM\Table(name:'reservations')]
class Reservation
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
     * Login.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 64)]
    private ?string $login = null;

    /**
     * Email.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 64)]
    private ?string $email = null;

    /**
     * Comment.
     *
     * @var string|null
     */
    #[ORM\Column(type: 'string', length: 64, nullable: true)]
    private ?string $comment = null;

    /**
     * @var Item|null
     */
    #[ORM\ManyToOne(targetEntity: Item::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item;

    /**
     * @var Status|null
     */
    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'reservation')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Status $status;

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
     * Getter for Login.
     *
     * @return string|null Id
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * Setter for Login.
     *
     * @param string|null $login Login
     */
    public function setLogin(?string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Getter for Email.
     *
     * @return string|null Id
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Setter for Email.
     *
     * @param string|null $email Email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Getter for Comment.
     *
     * @return string|null Id
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Setter for Comment.
     *
     * @param string|null $comment Comment
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Getter for Item.
     *
     * @return Item|null Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * Setter for Item.
     *
     * @param Item|null $item Item
     */
    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Getter for Status.
     *
     * @return Status|null Status
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * Setter for Status.
     *
     * @param Status|null $status Status
     */
    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

}
