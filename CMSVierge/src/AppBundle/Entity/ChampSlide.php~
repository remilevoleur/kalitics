<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampSlide
 *
 * @ORM\Table(name="champ_slide")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampSlideRepository")
 */
class ChampSlide extends Composant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampSlideContent", mappedBy="champSlide", cascade={"persist"}, orphanRemoval=true)
     */
    private $champsSlideContent;

    /**
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsSlide")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bloc_id", referencedColumnName="id")
     * })
     */
    protected $bloc;


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
     * Set imagesUrl
     *
     * @param array $imagesUrl
     *
     * @return ChampSlide
     */
    public function setImagesUrl($imagesUrl)
    {
        $this->imagesUrl = $imagesUrl;

        return $this;
    }

    /**
     * Get imagesUrl
     *
     * @return array
     */
    public function getImagesUrl()
    {
        return $this->imagesUrl;
    }

    /**
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampSlide
     */
    public function setBloc(\AppBundle\Entity\Bloc $bloc = null)
    {
        $this->bloc = $bloc;

        return $this;
    }

    /**
     * Get bloc
     *
     * @return \AppBundle\Entity\Bloc
     */
    public function getBloc()
    {
        return $this->bloc;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->champsSlideContent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add champsSlideContent
     *
     * @param \AppBundle\Entity\ChampSlideContent $champsSlideContent
     *
     * @return ChampSlide
     */
    public function addChampsSlideContent(\AppBundle\Entity\ChampSlideContent $champsSlideContent)
    {
        $champsSlideContent->setChampSlide($this);
        $this->champsSlideContent[] = $champsSlideContent;

        return $this;
    }

    /**
     * Remove champsSlideContent
     *
     * @param \AppBundle\Entity\ChampSlideContent $champsSlideContent
     */
    public function removeChampsSlideContent(\AppBundle\Entity\ChampSlideContent $champsSlideContent)
    {
        $this->champsSlideContent->removeElement($champsSlideContent);
    }

    /**
     * Get champsSlideContent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsSlideContent()
    {
        return $this->champsSlideContent;
    }
}
