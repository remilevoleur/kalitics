<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\MappedSuperclass */
class Composant
{
    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;       

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Composant
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }   

}
