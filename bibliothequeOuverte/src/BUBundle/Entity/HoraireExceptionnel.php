<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HoraireExceptionnel
 *
 * @ORM\Table(name="horaire_exceptionnel")
 * @ORM\Entity
 */
class HoraireExceptionnel
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
     * @var \Date
     *
     * @ORM\Column(name="jourDebut", type="date", nullable=false)
     */
    private $jourDebut;

    /**
     * @var \Date
     *
     * @ORM\Column(name="jourFin", type="date", nullable=false)
     */
    private $jourFin;

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
    private $ouvert = '1';

    /**
     * @var \Bibliotheque
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque", inversedBy="horairesExceptionnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bibliotheque_id", referencedColumnName="id")
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
     * Set jour
     *
     * @param \DateTime $jour
     *
     * @return HoraireExceptionnel
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return \DateTime
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
     * @return HoraireExceptionnel
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
     * @return HoraireExceptionnel
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
     * Set bibliotheque
     *
     * @param integer $bibliotheque
     *
     * @return HoraireExceptionnel
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

    /**
     * Set ouvert
     *
     * @param boolean $ouvert
     *
     * @return HoraireExceptionnel
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
     * Set jourDebut
     *
     * @param \DateTime $jourDebut
     *
     * @return HoraireExceptionnel
     */
    public function setJourDebut($jourDebut)
    {
        $this->jourDebut = $jourDebut;

        return $this;
    }

    /**
     * Get jourDebut
     *
     * @return \DateTime
     */
    public function getJourDebut()
    {
        return $this->jourDebut;
    }

    /**
     * Set jourFin
     *
     * @param \DateTime $jourFin
     *
     * @return HoraireExceptionnel
     */
    public function setJourFin($jourFin)
    {
        $this->jourFin = $jourFin;

        return $this;
    }

    /**
     * Get jourFin
     *
     * @return \DateTime
     */
    public function getJourFin()
    {
        return $this->jourFin;
    }
}
