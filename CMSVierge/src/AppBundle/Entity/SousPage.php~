<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousPage
 *
 * @ORM\Table(name="souspage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SousPageRepository")
 */
class SousPage
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
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255)
     */
    private $route;

    /**
     * @var string
     *
     * @ORM\Column(name="background", type="string", length=255, nullable=true)
     */
    private $background;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var \Page
     *
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="sousPages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     * })
     */
    private $page;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bloc", mappedBy="page", cascade={"persist"}, orphanRemoval=true)
     */
    private $blocsCentre;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bloc", mappedBy="page", cascade={"persist"}, orphanRemoval=true)
     */
    private $blocsDroite;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bloc", mappedBy="page", cascade={"persist"}, orphanRemoval=true)
     */
    private $blocsGauche;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bloc", mappedBy="page", cascade={"persist"}, orphanRemoval=true)
     */
    private $blocs;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ChampImage", cascade={"persist"})
     * @ORM\JoinTable(name="souspages_images",
     *      joinColumns={@ORM\JoinColumn(name="souspage_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="id")}
     *      )
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $images;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return SousPage
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set route
     *
     * @param string $route
     *
     * @return SousPage
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blocsCentre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->blocsDroite = new \Doctrine\Common\Collections\ArrayCollection();
        $this->blocsGauche = new \Doctrine\Common\Collections\ArrayCollection();
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add blocCentre
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return SousPage
     */
    public function addBlocsCentre(\AppBundle\Entity\Bloc $bloc)
    {
        $this->blocsCentre[] = $bloc;

        $bloc->setPage($this);
        $bloc->setPosition("centre");

        return $this;
    }

    /**
     * Add blocDroite
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return SousPage
     */
    public function addBlocsDroite(\AppBundle\Entity\Bloc $bloc)
    {
        $this->blocsDroite[] = $bloc;

        $bloc->setPage($this);
        $bloc->setPosition("droite");

        return $this;
    }

    /**
     * Add blocGauche
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return SousPage
     */
    public function addBlocsGauche(\AppBundle\Entity\Bloc $bloc)
    {
        $this->blocsGauche[] = $bloc;

        $bloc->setPage($this);
        $bloc->setPosition("gauche");

        return $this;
    }

    /**
     * Get blocsCentre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocsCentre()
    {
        $tmpBlocs = null;
        foreach($this->blocsCentre as $bloc){
            if($bloc->getPosition() == "centre")
                $tmpBlocs[] = $bloc;
        }
        return $tmpBlocs;
    }
    
    /**
     * Get blocsGauche
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocsGauche()
    {
        $tmpBlocs = null;
        foreach($this->blocsGauche as $bloc){
            if($bloc->getPosition() == "gauche")
                $tmpBlocs[] = $bloc;
        }
        return $tmpBlocs;
    }

    /**
     * Get blocsDroite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocsDroite()
    {
        $tmpBlocs = null;
        foreach($this->blocsDroite as $bloc){
            if($bloc->getPosition() == "droite")
                $tmpBlocs[] = $bloc;
        }
        return $tmpBlocs;
    }

    /**
     * Remove blocsCentre
     *
     * @param \AppBundle\Entity\Bloc $blocsCentre
     */
    public function removeBlocsCentre(\AppBundle\Entity\Bloc $blocsCentre)
    {
        $this->blocsCentre->removeElement($blocsCentre);
    }


    /**
     * Remove blocsDroite
     *
     * @param \AppBundle\Entity\Bloc $blocsDroite
     */
    public function removeBlocsDroite(\AppBundle\Entity\Bloc $blocsDroite)
    {
        $this->blocsDroite->removeElement($blocsDroite);
    }

    /**
     * Remove blocsGauche
     *
     * @param \AppBundle\Entity\Bloc $blocsGauche
     */
    public function removeBlocsGauche(\AppBundle\Entity\Bloc $blocsGauche)
    {
        $this->blocsGauche->removeElement($blocsGauche);
    }

    /**
     * Add bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return SousPage
     */
    public function addBloc(\AppBundle\Entity\Bloc $bloc)
    {
        $this->blocs[] = $bloc;

        return $this;
    }

    /**
     * Remove bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     */
    public function removeBloc(\AppBundle\Entity\Bloc $bloc)
    {
        $this->blocs->removeElement($bloc);
    }

    /**
     * Set background
     *
     * @param string $background
     *
     * @return SousPage
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Get blocs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlocs()
    {
        return $this->blocs;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return SousPage
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return SousPage
     */
    public function setPage(\AppBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \AppBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return SousPage
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\ChampImage $image
     *
     * @return SousPage
     */
    public function addImage(\AppBundle\Entity\ChampImage $image)
    {        
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\ChampImage $image
     */
    public function removeImage(\AppBundle\Entity\ChampImage $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
