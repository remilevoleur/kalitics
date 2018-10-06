<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidature
 *
 * @ORM\Table(name="candidature")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CandidatureRepository")
 */
class Candidature
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=40)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="Demande", inversedBy="candidatures")
     * @ORM\JoinColumn(name="demande_id", referencedColumnName="id")
     */
    private $demande;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="candidatures")
     * @ORM\JoinColumn(name="personnel_id", referencedColumnName="id")
     */
    private $personnel;


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
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Candidature
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set statut.
     *
     * @param string $statut
     *
     * @return Candidature
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut.
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set demande.
     *
     * @param \AppBundle\Entity\Demande|null $demande
     *
     * @return Candidature
     */
    public function setDemande(\AppBundle\Entity\Demande $demande = null)
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * Get demande.
     *
     * @return \AppBundle\Entity\Demande|null
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * Set personnel.
     *
     * @param \Application\Sonata\UserBundle\Entity\User|null $personnel
     *
     * @return Candidature
     */
    public function setPersonnel(\Application\Sonata\UserBundle\Entity\User $personnel = null)
    {
        $this->personnel = $personnel;

        return $this;
    }

    /**
     * Get personnel.
     *
     * @return \Application\Sonata\UserBundle\Entity\User|null
     */
    public function getPersonnel()
    {
        return $this->personnel;
    }
}
