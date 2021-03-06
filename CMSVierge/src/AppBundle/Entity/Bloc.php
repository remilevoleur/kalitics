<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bloc
 *
 * @ORM\Table(name="bloc")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlocRepository")
 */
class Bloc
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
     * @var \Page
     *
     * @ORM\ManyToOne(targetEntity="SousPage", inversedBy="blocs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sousPage_id", referencedColumnName="id")
     * })
     */
    private $page;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampMap", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsMap;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampTitre", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsTitre;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampTexte", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsTexte;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampSlide", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsSlide;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampActualite", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsActualite;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampImage", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsImage;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampEncart", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsEncart;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampEmbarque", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsEmbarque;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampFormulaire", mappedBy="bloc", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $champsFormulaire;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255, nullable=true)
     */
    private $position;


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
     * Set sousPage
     *
     * @param \AppBundle\Entity\SousPage $sousPage
     *
     * @return Bloc
     */
    public function setPage(\AppBundle\Entity\SousPage $sousPage = null)
    {
        $this->page = $sousPage;

        return $this;
    }

    /**
     * Get sousPage
     *
     * @return \AppBundle\Entity\SousPage
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     *
     * @param \AppBundle\Entity\ChampTexte $champsTexte
     *
     * @return Bloc
     */
    public function addChampsTexte(\AppBundle\Entity\ChampTexte $champsTexte)
    {
        $this->champsTexte[] = $champsTexte;

        $champsTexte->setBloc($this);

        return $this;
    }

    /**
     * Set position
     *
     * @param string $position
     *
     * @return Bloc
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }    

    /**
     * Add champsMap
     *
     * @param \AppBundle\Entity\ChampMap $champsMap
     *
     * @return Bloc
     */
    public function addChampsMap(\AppBundle\Entity\ChampMap $champsMap)
    {
        $this->champsMap[] = $champsMap;

        $champsMap->setBloc($this);

        return $this;
    }

    /**
     * Remove champsMap
     *
     * @param \AppBundle\Entity\ChampMap $champsMap
     */
    public function removeChampsMap(\AppBundle\Entity\ChampMap $champsMap)
    {
        $this->champsMap->removeElement($champsMap);
    }

    /**
     * Get champsMap
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsMap()
    {
        return $this->champsMap;
    }

    /**
     * Remove champsTexte
     *
     * @param \AppBundle\Entity\ChampTexte $champsTexte
     */
    public function removeChampsTexte(\AppBundle\Entity\ChampTexte $champsTexte)
    {
        $this->champsTexte->removeElement($champsTexte);
    }

    /**
     * Get champsTexte
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsTexte()
    {
        return $this->champsTexte;
    }

    /**
     * Add champsActualite
     *
     * @param \AppBundle\Entity\ChampActualite $champsActualite
     *
     * @return Bloc
     */
    public function addChampsActualite(\AppBundle\Entity\ChampActualite $champsActualite)
    {
        $this->champsActualite[] = $champsActualite;

        $champsActualite->setBloc($this);

        return $this;
    }

    /**
     * Remove champsActualite
     *
     * @param \AppBundle\Entity\ChampActualite $champsActualite
     */
    public function removeChampsActualite(\AppBundle\Entity\ChampActualite $champsActualite)
    {
        $this->champsActualite->removeElement($champsActualite);
    }

    /**
     * Get champsActualite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsActualite()
    {
        return $this->champsActualite;
    }

    /**
     * Add champsImage
     *
     * @param \AppBundle\Entity\ChampImage $champsImage
     *
     * @return Bloc
     */
    public function addChampsImage(\AppBundle\Entity\ChampImage $champsImage)
    {
        $this->champsImage[] = $champsImage;

        $champsImage->setBloc($this);

        return $this;
    }

    /**
     * Remove champsImage
     *
     * @param \AppBundle\Entity\ChampImage $champsImage
     */
    public function removeChampsImage(\AppBundle\Entity\ChampImage $champsImage)
    {
        $this->champsImage->removeElement($champsImage);
    }

    /**
     * Get champsImage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsImage()
    {
        return $this->champsImage;
    }   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->champsMap = new \Doctrine\Common\Collections\ArrayCollection();
        $this->champsTexte = new \Doctrine\Common\Collections\ArrayCollection();
        $this->champsSlide = new \Doctrine\Common\Collections\ArrayCollection();
        $this->champsActualite = new \Doctrine\Common\Collections\ArrayCollection();
        $this->champsImage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add champsSlide
     *
     * @param \AppBundle\Entity\ChampSlide $champsSlide
     *
     * @return Bloc
     */
    public function addChampsSlide(\AppBundle\Entity\ChampSlide $champsSlide)
    {
        $champsSlide->setBloc($this);
        $this->champsSlide[] = $champsSlide;

        return $this;
    }

    /**
     * Remove champsSlide
     *
     * @param \AppBundle\Entity\ChampSlide $champsSlide
     */
    public function removeChampsSlide(\AppBundle\Entity\ChampSlide $champsSlide)
    {
        $this->champsSlide->removeElement($champsSlide);
    }

    /**
     * Get champsSlide
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsSlide()
    {
        return $this->champsSlide;
    }

    /**
     * Add champsTitre
     *
     * @param \AppBundle\Entity\ChampTitre $champsTitre
     *
     * @return Bloc
     */
    public function addChampsTitre(\AppBundle\Entity\ChampTitre $champsTitre)
    {
        $champsTitre->setBloc($this);
        $this->champsTitre[] = $champsTitre;

        return $this;
    }

    /**
     * Remove champsTitre
     *
     * @param \AppBundle\Entity\ChampTitre $champsTitre
     */
    public function removeChampsTitre(\AppBundle\Entity\ChampTitre $champsTitre)
    {
        $this->champsTitre->removeElement($champsTitre);
    }

    /**
     * Get champsTitre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsTitre()
    {
        return $this->champsTitre;
    }    

    /**
     * Add champsFormulaire
     *
     * @param \AppBundle\Entity\ChampFormulaire $champsFormulaire
     *
     * @return Bloc
     */
    public function addChampsFormulaire(\AppBundle\Entity\ChampFormulaire $champsFormulaire)
    {
        $champsFormulaire->setBloc($this);
        $this->champsFormulaire[] = $champsFormulaire;

        return $this;
    }

    /**
     * Remove champsFormulaire
     *
     * @param \AppBundle\Entity\ChampFormulaire $champsFormulaire
     */
    public function removeChampsFormulaire(\AppBundle\Entity\ChampFormulaire $champsFormulaire)
    {
        $this->champsFormulaire->removeElement($champsFormulaire);
    }

    /**
     * Get champsFormulaire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsFormulaire()
    {
        return $this->champsFormulaire;
    }

    /**
     * Add champsEncart
     *
     * @param \AppBundle\Entity\ChampEncart $champsEncart
     *
     * @return Bloc
     */
    public function addChampsEncart(\AppBundle\Entity\ChampEncart $champsEncart)
    {
        $champsEncart->setBloc($this);
        $this->champsEncart[] = $champsEncart;

        return $this;
    }

    /**
     * Remove champsEncart
     *
     * @param \AppBundle\Entity\ChampEncart $champsEncart
     */
    public function removeChampsEncart(\AppBundle\Entity\ChampEncart $champsEncart)
    {
        $this->champsEncart->removeElement($champsEncart);
    }

    /**
     * Get champsEncart
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsEncart()
    {
        return $this->champsEncart;
    }

    /**
     * Add champsEmbarque
     *
     * @param \AppBundle\Entity\ChampEmbarque $champsEmbarque
     *
     * @return Bloc
     */
    public function addChampsEmbarque(\AppBundle\Entity\ChampEmbarque $champsEmbarque)
    {
        $champsEmbarque->setBloc($this);
        $this->champsEmbarque[] = $champsEmbarque;

        return $this;
    }

    /**
     * Remove champsEmbarque
     *
     * @param \AppBundle\Entity\ChampEmbarque $champsEmbarque
     */
    public function removeChampsEmbarque(\AppBundle\Entity\ChampEmbarque $champsEmbarque)
    {
        $this->champsEmbarque->removeElement($champsEmbarque);
    }

    /**
     * Get champsEmbarque
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsEmbarque()
    {
        return $this->champsEmbarque;
    }
}
