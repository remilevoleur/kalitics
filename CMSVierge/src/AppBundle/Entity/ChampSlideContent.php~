<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampSlideContent
 *
 * @ORM\Table(name="champ_slide_content")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampSlideContentRepository")
 */
class ChampSlideContent
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="datetime", length=255)
     */
    private $date; 

    /**
     * @var text
     *
     * @ORM\Column(name="texte", type="text", nullable=true)
     */
    private $texte;

    /**
     * @var string
     *
     * @ORM\Column(name="texteCouleur", type="string", length=255)
     */
    private $texteCouleur;

    /**
     * @var \ChampSlide
     *
     * @ORM\ManyToOne(targetEntity="ChampSlide", inversedBy="champsSlideContent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="champslide_id", referencedColumnName="id")
     * })
     */
    protected $champSlide;


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
     * Set url
     *
     * @param string $url
     *
     * @return ChampSlideContent
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return ChampSlideContent
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set champSlide
     *
     * @param \AppBundle\Entity\ChampSlide $champSlide
     *
     * @return ChampSlideContent
     */
    public function setChampSlide(\AppBundle\Entity\ChampSlide $champSlide = null)
    {
        $this->champSlide = $champSlide;

        return $this;
    }

    /**
     * Get champSlide
     *
     * @return \AppBundle\Entity\ChampSlide
     */
    public function getChampSlide()
    {
        return $this->champSlide;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ChampSlideContent
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDateCachee()
    {
        return $this->date;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ChampActualiteContent
     */
    public function setDateCachee($date)
    {
        return $this;
    }

    /**
     * Set texteCouleur
     *
     * @param string $texteCouleur
     *
     * @return ChampSlideContent
     */
    public function setTexteCouleur($texteCouleur)
    {
        $this->texteCouleur = $texteCouleur;

        return $this;
    }

    /**
     * Get texteCouleur
     *
     * @return string
     */
    public function getTexteCouleur()
    {
        return $this->texteCouleur;
    }
}
