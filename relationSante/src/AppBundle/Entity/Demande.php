<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DemandeRepository")
 */
class Demande
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
     * @var float
     *
     * @ORM\Column(name="salaire", type="float")
     */
    private $salaire;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=40)
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=200)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jour", type="date")
     */
    private $jour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Creneau")
     * @ORM\JoinTable(name="demandes_creneaux",
     *      joinColumns={@ORM\JoinColumn(name="demande_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="creneau_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $creneaux;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Specialite")
     * @ORM\JoinColumn(name="specialite_id", referencedColumnName="id")
     */
    private $specialite;

    /**
     * @ORM\OneToMany(targetEntity="Candidature", mappedBy="demande")
     */
    private $candidatures;

    /**
     * @ORM\ManyToOne(targetEntity="Mission")
     * @ORM\JoinColumn(name="mission_id", referencedColumnName="id")
     */
    private $mission;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etablissement", inversedBy="demandes")
     * @ORM\JoinColumn(name="etablissement_id", referencedColumnName="id")
     */
    private $etablissement;


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
     * Set salaire.
     *
     * @param float $salaire
     *
     * @return Demande
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire.
     *
     * @return float
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set statut.
     *
     * @param string $statut
     *
     * @return Demande
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
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Demande
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->creneaux = new \Doctrine\Common\Collections\ArrayCollection();
        $this->candidatures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set jour.
     *
     * @param \DateTime $jour
     *
     * @return Demande
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour.
     *
     * @return \DateTime
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Demande
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
     * Add creneaux.
     *
     * @param \AppBundle\Entity\Creneau $creneaux
     *
     * @return Demande
     */
    public function addCreneaux(\AppBundle\Entity\Creneau $creneaux)
    {
        $this->creneaux[] = $creneaux;

        return $this;
    }

    /**
     * Remove creneaux.
     *
     * @param \AppBundle\Entity\Creneau $creneaux
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCreneaux(\AppBundle\Entity\Creneau $creneaux)
    {
        return $this->creneaux->removeElement($creneaux);
    }

    /**
     * Get creneaux.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreneaux()
    {
        return $this->creneaux;
    }

    /**
     * Set specialite.
     *
     * @param \AppBundle\Entity\Specialite|null $specialite
     *
     * @return Demande
     */
    public function setSpecialite(\AppBundle\Entity\Specialite $specialite = null)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite.
     *
     * @return \AppBundle\Entity\Specialite|null
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Add candidature.
     *
     * @param \AppBundle\Entity\Candidature $candidature
     *
     * @return Demande
     */
    public function addCandidature(\AppBundle\Entity\Candidature $candidature)
    {
        $this->candidatures[] = $candidature;

        return $this;
    }

    /**
     * Remove candidature.
     *
     * @param \AppBundle\Entity\Candidature $candidature
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCandidature(\AppBundle\Entity\Candidature $candidature)
    {
        return $this->candidatures->removeElement($candidature);
    }

    /**
     * Get candidatures.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCandidatures()
    {
        return $this->candidatures;
    }

    /**
     * Set mission.
     *
     * @param \AppBundle\Entity\Mission|null $mission
     *
     * @return Demande
     */
    public function setMission(\AppBundle\Entity\Mission $mission = null)
    {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission.
     *
     * @return \AppBundle\Entity\Mission|null
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Set etablissement.
     *
     * @param \AppBundle\Entity\Etablissement|null $etablissement
     *
     * @return Demande
     */
    public function setEtablissement(\AppBundle\Entity\Etablissement $etablissement = null)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get etablissement.
     *
     * @return \AppBundle\Entity\Etablissement|null
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }
}
