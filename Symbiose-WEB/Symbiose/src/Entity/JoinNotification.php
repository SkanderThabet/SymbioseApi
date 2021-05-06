<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JoinNotificationRepository")
 */
class JoinNotification extends Notification
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Game")
     * @Groups("post:read")
     */
    private $game;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @Groups("post:read")
     */
    private $joinedBy;

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param mixed $game
     */
    public function setGame($game): void
    {
        $this->game = $game;
    }

    /**
     * @return mixed
     */
    public function getJoinedBy()
    {
        return $this->joinedBy;
    }

    /**
     * @param mixed $joinedBy
     */
    public function setJoinedBy($joinedBy): void
    {
        $this->joinedBy = $joinedBy;
    }
}
