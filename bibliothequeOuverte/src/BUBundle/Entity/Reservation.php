<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="salle", columns={"salle"})})
 * @ORM\Entity
 */
class Reservation
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
     * @ORM\Column(name="date_reservation", type="date", nullable=false)
     */
    private $dateReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_reservation", type="time", nullable=false)
     */
    private $heureReservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time", nullable=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="email_reservation", type="string", length=30, nullable=false)
     */
    private $emailReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmkey", type="string", length=255, nullable=false)
     */
    private $confirmkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="confirme", type="integer", nullable=false)
     */
    private $confirme;

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
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Reservation
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set heureReservation
     *
     * @param \DateTime $heureReservation
     *
     * @return Reservation
     */
    public function setHeureReservation($heureReservation)
    {
        $this->heureReservation = $heureReservation;

        return $this;
    }

    /**
     * Get heureReservation
     *
     * @return \DateTime
     */
    public function getHeureReservation()
    {
        return $this->heureReservation;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return Reservation
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set emailReservation
     *
     * @param string $emailReservation
     *
     * @return Reservation
     */
    public function setEmailReservation($emailReservation)
    {
        $this->emailReservation = $emailReservation;

        return $this;
    }

    /**
     * Get emailReservation
     *
     * @return string
     */
    public function getEmailReservation()
    {
        return $this->emailReservation;
    }

    /**
     * Set confirmkey
     *
     * @param string $confirmkey
     *
     * @return Reservation
     */
    public function setConfirmkey($confirmkey)
    {
        $this->confirmkey = $confirmkey;

        return $this;
    }

    /**
     * Get confirmkey
     *
     * @return string
     */
    public function getConfirmkey()
    {
        return $this->confirmkey;
    }

    /**
     * Set confirme
     *
     * @param integer $confirme
     *
     * @return Reservation
     */
    public function setConfirme($confirme)
    {
        $this->confirme = $confirme;

        return $this;
    }

    /**
     * Get confirme
     *
     * @return integer
     */
    public function getConfirme()
    {
        return $this->confirme;
    }

    /**
     * Set salle
     *
     * @param \BUBundle\Entity\Salle $salle
     *
     * @return Reservation
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
