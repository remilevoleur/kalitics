<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity
 */
class Service
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Bibliotheque", mappedBy="service")
     */
    private $bibliotheque;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bibliotheque = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Service
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add bibliotheque
     *
     * @param \BUBundle\Entity\Bibliotheque $bibliotheque
     *
     * @return Service
     */
    public function addBibliotheque(\BUBundle\Entity\Bibliotheque $bibliotheque)
    {
        $this->bibliotheque[] = $bibliotheque;

        return $this;
    }

    /**
     * Remove bibliotheque
     *
     * @param \BUBundle\Entity\Bibliotheque $bibliotheque
     */
    public function removeBibliotheque(\BUBundle\Entity\Bibliotheque $bibliotheque)
    {
        $this->bibliotheque->removeElement($bibliotheque);
    }

    /**
     * Get bibliotheque
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBibliotheque()
    {
        return $this->bibliotheque;
    }
}
