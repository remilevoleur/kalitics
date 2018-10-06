<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dossier
 *
 * @ORM\Table(name="dossier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DossierRepository")
 */
class Dossier
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Dossier", mappedBy="racine")
     */
    private $branches;

    /**
     * @ORM\ManyToOne(targetEntity="Dossier", inversedBy="branches")
     * @ORM\JoinColumn(name="racine_id", referencedColumnName="id")
     */
    private $racine;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Fichier", mappedBy="dossier", cascade={"persist"}, orphanRemoval=true)
     */
    private $fichiers;


    /**
     * Get id
     *
     * @return int
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
     * @return Dossier
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
     * Constructor
     */
    public function __construct()
    {
        $this->branches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fichiers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add branch
     *
     * @param \AppBundle\Entity\Dossier $branch
     *
     * @return Dossier
     */
    public function addBranch(\AppBundle\Entity\Dossier $branch)
    {
        $this->branches[] = $branch;

        return $this;
    }

    /**
     * Remove branch
     *
     * @param \AppBundle\Entity\Dossier $branch
     */
    public function removeBranch(\AppBundle\Entity\Dossier $branch)
    {
        $this->branches->removeElement($branch);
    }

    /**
     * Get branches
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBranches()
    {
        return $this->branches;
    }

    /**
     * Set racine
     *
     * @param \AppBundle\Entity\Dossier $racine
     *
     * @return Dossier
     */
    public function setRacine(\AppBundle\Entity\Dossier $racine = null)
    {
        $this->racine = $racine;

        return $this;
    }

    /**
     * Get racine
     *
     * @return \AppBundle\Entity\Dossier
     */
    public function getRacine()
    {
        return $this->racine;
    }

    /**
     * Add fichier
     *
     * @param \AppBundle\Entity\Fichier $fichier
     *
     * @return Dossier
     */
    public function addFichier(\AppBundle\Entity\Fichier $fichier)
    {
        $this->fichiers[] = $fichier;

        return $this;
    }

    /**
     * Remove fichier
     *
     * @param \AppBundle\Entity\Fichier $fichier
     */
    public function removeFichier(\AppBundle\Entity\Fichier $fichier)
    {
        $this->fichiers->removeElement($fichier);
    }

    /**
     * Get fichiers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFichiers()
    {
        return $this->fichiers;
    }
}
