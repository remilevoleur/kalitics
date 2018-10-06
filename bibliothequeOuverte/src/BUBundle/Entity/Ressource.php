<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ressource
 *
 * @ORM\Table(name="ressource")
 * @ORM\Entity
 */
class Ressource
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
     * @ORM\Column(name="type", type="string", length=30, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree_max_reservation", type="integer", nullable=false)
     */
    private $dureeMaxReservation;

    /**
     * @var integer
     *
     * @ORM\Column(name="bibliotheque", type="integer", nullable=true)
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
     * Set type
     *
     * @param string $type
     *
     * @return Ressource
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Ressource
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
     * Set description
     *
     * @param string $description
     *
     * @return Ressource
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dureeMaxReservation
     *
     * @param integer $dureeMaxReservation
     *
     * @return Ressource
     */
    public function setDureeMaxReservation($dureeMaxReservation)
    {
        $this->dureeMaxReservation = $dureeMaxReservation;

        return $this;
    }

    /**
     * Get dureeMaxReservation
     *
     * @return integer
     */
    public function getDureeMaxReservation()
    {
        return $this->dureeMaxReservation;
    }

    /**
     * Set bibliotheque
     *
     * @param integer $bibliotheque
     *
     * @return Ressource
     */
    public function setBibliotheque($bibliotheque)
    {
        $this->bibliotheque = $bibliotheque;

        return $this;
    }

    /**
     * Get bibliotheque
     *
     * @return integer
     */
    public function getBibliotheque()
    {
        return $this->bibliotheque;
    }
}
