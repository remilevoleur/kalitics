<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metier
 *
 * @ORM\Table(name="metier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MetierRepository")
 */
class Metier
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
     * @ORM\Column(name="libelle", type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Specialite")
     * @ORM\JoinTable(name="metiers_specialites",
     *      joinColumns={@ORM\JoinColumn(name="metier_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="specialite_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $specialites;


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
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Metier
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
        $this->specialites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add specialite.
     *
     * @param \AppBundle\Entity\Specialite $specialite
     *
     * @return Metier
     */
    public function addSpecialite(\AppBundle\Entity\Specialite $specialite)
    {
        $this->specialites[] = $specialite;

        return $this;
    }

    /**
     * Remove specialite.
     *
     * @param \AppBundle\Entity\Specialite $specialite
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSpecialite(\AppBundle\Entity\Specialite $specialite)
    {
        return $this->specialites->removeElement($specialite);
    }

    /**
     * Get specialites.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecialites()
    {
        return $this->specialites;
    }
}
