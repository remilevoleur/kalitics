<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sortie
 *
 * @ORM\Table(name="sortie", indexes={@ORM\Index(name="bibliotheque", columns={"bibliotheque"})})
 * @ORM\Entity
 */
class Sortie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \Bibliotheque
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bibliotheque", referencedColumnName="id")
     * })
     */
    private $bibliotheque;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Sortie
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set bibliotheque
     *
     * @param \BUBundle\Entity\Bibliotheque $bibliotheque
     *
     * @return Sortie
     */
    public function setBibliotheque(\BUBundle\Entity\Bibliotheque $bibliotheque = null)
    {
        $this->bibliotheque = $bibliotheque;

        return $this;
    }

    /**
     * Get bibliotheque
     *
     * @return \BUBundle\Entity\Bibliotheque
     */
    public function getBibliotheque()
    {
        return $this->bibliotheque;
    }
}
