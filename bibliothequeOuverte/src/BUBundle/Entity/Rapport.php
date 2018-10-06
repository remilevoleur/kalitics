<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rapport
 *
 * @ORM\Table(name="rapport")
 * @ORM\Entity
 */
class Rapport
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="frequence", type="string", length=255, nullable=false)
     */
    private $frequence;

    /**
     * @var string
     *
     * @ORM\Column(name="granularite", type="string", length=255, nullable=false)
     */
    private $granularite;



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
     * @return Rapport
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
     * @return Rapport
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
     * Set frequence
     *
     * @param string $frequence
     *
     * @return Rapport
     */
    public function setFrequence($frequence)
    {
        $this->frequence = $frequence;

        return $this;
    }

    /**
     * Get frequence
     *
     * @return string
     */
    public function getFrequence()
    {
        return $this->frequence;
    }

    /**
     * Set granularite
     *
     * @param string $granularite
     *
     * @return Rapport
     */
    public function setGranularite($granularite)
    {
        $this->granularite = $granularite;

        return $this;
    }

    /**
     * Get granularite
     *
     * @return string
     */
    public function getGranularite()
    {
        return $this->granularite;
    }
}
