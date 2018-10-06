<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horaire
 *
 * @ORM\Table(name="horaire", indexes={@ORM\Index(name="IDX_BBC83DB64419DE7D", columns={"bibliotheque_id"})})
 * @ORM\Entity
 */
class Horaire
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
     * @ORM\Column(name="jour", type="string", length=10, nullable=true)
     */
    private $jour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_ouverture", type="time", nullable=true)
     */
    private $heureOuverture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_fermeture", type="time", nullable=true)
     */
    private $heureFermeture;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ouvert", type="boolean", nullable=false)
     */
    private $ouvert = true;

    /**
     * @var \Bibliotheque
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque", inversedBy="horaires")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bibliotheque_id", referencedColumnName="id")
     * })
     */
    private $bibliotheque;

    /**
     * Constructor
     */
    public function __construct($j, \BUBundle\Entity\Bibliotheque $b)
    {
        $this->jour = $j;
        $this->bibliotheque = $b;
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
     * Set jour
     *
     * @param string $jour
     *
     * @return Horaire
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return string
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set heureOuverture
     *
     * @param \DateTime $heureOuverture
     *
     * @return Horaire
     */
    public function setHeureOuverture($heureOuverture)
    {
        $this->heureOuverture = $heureOuverture;

        return $this;
    }

    /**
     * Get heureOuverture
     *
     * @return \DateTime
     */
    public function getHeureOuverture()
    {
        return $this->heureOuverture;
    }

    /**
     * Set heureFermeture
     *
     * @param \DateTime $heureFermeture
     *
     * @return Horaire
     */
    public function setHeureFermeture($heureFermeture)
    {
        $this->heureFermeture = $heureFermeture;

        return $this;
    }

    /**
     * Get heureFermeture
     *
     * @return \DateTime
     */
    public function getHeureFermeture()
    {
        return $this->heureFermeture;
    }

    /**
     * Set ouvert
     *
     * @param boolean $ouvert
     *
     * @return Horaire
     */
    public function setOuvert($ouvert)
    {
        $this->ouvert = $ouvert;

        return $this;
    }

    /**
     * Get ouvert
     *
     * @return boolean
     */
    public function getOuvert()
    {
        return $this->ouvert;
    }

    /**
     * Set bibliotheque
     *
     * @param \BUBundle\Entity\Bibliotheque $bibliotheque
     *
     * @return Horaire
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
