<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creneau
 *
 * @ORM\Table(name="creneau")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CreneauRepository")
 */
class Creneau
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="heureDebut", type="smallint")
     */
    private $heureDebut;

    /**
     * @var int
     *
     * @ORM\Column(name="heureFin", type="smallint")
     */
    private $heureFin;

    /**
     * @var int
     *
     * @ORM\Column(name="minuteDebut", type="smallint")
     */
    private $minuteDebut;

    /**
     * @var int
     *
     * @ORM\Column(name="minuteFin", type="smallint")
     */
    private $minuteFin;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set heureDebut.
     *
     * @param int $heureDebut
     *
     * @return Creneau
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut.
     *
     * @return int
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin.
     *
     * @param int $heureFin
     *
     * @return Creneau
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin.
     *
     * @return int
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set minuteDebut.
     *
     * @param int $minuteDebut
     *
     * @return Creneau
     */
    public function setMinuteDebut($minuteDebut)
    {
        $this->minuteDebut = $minuteDebut;

        return $this;
    }

    /**
     * Get minuteDebut.
     *
     * @return int
     */
    public function getMinuteDebut()
    {
        return $this->minuteDebut;
    }

    /**
     * Set minuteFin.
     *
     * @param int $minuteFin
     *
     * @return Creneau
     */
    public function setMinuteFin($minuteFin)
    {
        $this->minuteFin = $minuteFin;

        return $this;
    }

    /**
     * Get minuteFin.
     *
     * @return int
     */
    public function getMinuteFin()
    {
        return $this->minuteFin;
    }
}
