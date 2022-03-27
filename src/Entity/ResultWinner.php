<?php

namespace App\Entity;

use App\Repository\ResultWinnerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultWinnerRepository::class)]
class ResultWinner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $computer_result;

    #[ORM\Column(type: 'integer')]
    private $user_result;

    #[ORM\Column(type: 'string', length: 255)]
    private $winner;

    #[ORM\Column(type: 'string', length: 255)]
    private $Date;

    #[ORM\Column(type: 'string', length: 255)]
    private $time;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComputerResult(): ?int
    {
        return $this->computer_result;
    }

    public function setComputerResult(int $computer_result): self
    {
        $this->computer_result = $computer_result;

        return $this;
    }

    public function getUserResult(): ?int
    {
        return $this->user_result;
    }

    public function setUserResult(int $user_result): self
    {
        $this->user_result = $user_result;

        return $this;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(string $winner): self
    {
        $this->winner = $winner;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->Date;
    }

    public function setDate(string $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

}
