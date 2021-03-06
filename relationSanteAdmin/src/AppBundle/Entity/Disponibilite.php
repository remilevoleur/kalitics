<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disponibilite
 *
 * @ORM\Table(name="disponibilite")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DisponibiliteRepository")
 */
class Disponibilite
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
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=50)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=50)
     */
    private $latitude;

    /**
     * @var int|null
     *
     * @ORM\Column(name="rayon", type="smallint")
     */
    private $rayon;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jour", type="date", nullable=true)
     */
    private $jour;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Mission", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="disponibilites_missions",
     *      joinColumns={@ORM\JoinColumn(name="disponibilite_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="mission_id", referencedColumnName="id")}
     *      )
     */
    private $missions;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Creneau")
     * @ORM\JoinTable(name="disponibilites_creneaux",
     *      joinColumns={@ORM\JoinColumn(name="disponibilite_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="creneau_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $creneaux;


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
     * Set rayon.
     *
     * @param int|null $rayon
     *
     * @return Disponibilite
     */
    public function setRayon($rayon = null)
    {
        $this->rayon = $rayon;

        return $this;
    }

    /**
     * Get rayon.
     *
     * @return int|null
     */
    public function getRayon()
    {
        return $this->rayon;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return Disponibilite
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->missions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creneaux = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set jour.
     *
     * @param \DateTime $jour
     *
     * @return Disponibilite
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
     * Add mission.
     *
     * @param \AppBundle\Entity\Mission $mission
     *
     * @return Disponibilite
     */
    public function addMission(\AppBundle\Entity\Mission $mission)
    {
        $this->missions[] = $mission;

        return $this;
    }

    /**
     * Remove mission.
     *
     * @param \AppBundle\Entity\Mission $mission
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMission(\AppBundle\Entity\Mission $mission)
    {
        return $this->missions->removeElement($mission);
    }

    /**
     * Get missions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * Add creneaux.
     *
     * @param \AppBundle\Entity\Creneau $creneaux
     *
     * @return Disponibilite
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
     * Set long.
     *
     * @param string $long
     *
     * @return Disponibilite
     */
    public function setLongitude($long)
    {
        $this->longitude = $long;

        return $this;
    }

    /**
     * Get long.
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set lat.
     *
     * @param string $lat
     *
     * @return Disponibilite
     */
    public function setLatitude($lat)
    {
        $this->latitude = $lat;

        return $this;
    }

    /**
     * Get lat.
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
