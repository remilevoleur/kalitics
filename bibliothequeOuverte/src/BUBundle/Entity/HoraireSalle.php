<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HoraireSalle
 *
 * @ORM\Table(name="horaire_salle", indexes={@ORM\Index(name="salle", columns={"salle"})})
 * @ORM\Entity
 */
class HoraireSalle
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
     * @ORM\Column(name="jour", type="string", length=15, nullable=false)
     */
    private $jour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_ouverture", type="time", nullable=false)
     */
    private $heureOuverture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_fermeture", type="time", nullable=false)
     */
    private $heureFermeture;

    /**
     * @var \Salle
     *
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="salle", referencedColumnName="id")
     * })
     */
    private $salle;



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
     * @return HoraireSalle
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
     * @return HoraireSalle
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
     * @return HoraireSalle
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
     * Set salle
     *
     * @param \BUBundle\Entity\Salle $salle
     *
     * @return HoraireSalle
     */
    public function setSalle(\BUBundle\Entity\Salle $salle = null)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return \BUBundle\Entity\Salle
     */
    public function getSalle()
    {
        return $this->salle;
    }
}
