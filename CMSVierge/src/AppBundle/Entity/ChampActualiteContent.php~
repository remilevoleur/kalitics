<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampActualiteContent
 *
 * @ORM\Table(name="champ_actualite_content")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampActualiteContentRepository")
 */
class ChampActualiteContent
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var \ChampActualite
     *
     * @ORM\ManyToOne(targetEntity="ChampActualite", inversedBy="champsActualiteContent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="champActualite_id", referencedColumnName="id")
     * })
     */
    protected $champActualite;

    /**
     * @ORM\OneToOne(targetEntity="SousPage")
     * @ORM\JoinColumn(name="sousPage_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $ancre;

    /**
     * @ORM\OneToOne(targetEntity="ChampImage", cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $image;    

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="datetime", length=255)
     */
    private $date; 


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
     * Set titre
     *
     * @param string $titre
     *
     * @return ChampActualiteContent
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set texte
     *
     * @param string $texte
     *
     * @return ChampActualiteContent
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
     * Set champActualite
     *
     * @param \AppBundle\Entity\ChampActualite $champActualite
     *
     * @return ChampActualiteContent
     */
    public function setChampActualite(\AppBundle\Entity\ChampActualite $champActualite = null)
    {
        $this->champActualite = $champActualite;

        return $this;
    }

    /**
     * Get champActualite
     *
     * @return \AppBundle\Entity\ChampActualite
     */
    public function getChampActualite()
    {
        return $this->champActualite;
    }

    /**
     * Set ancre
     *
     * @param \AppBundle\Entity\SousPage $ancre
     *
     * @return ChampActualiteContent
     */
    public function setAncre(\AppBundle\Entity\SousPage $ancre = null)
    {
        $this->ancre = $ancre;

        return $this;
    }

    /**
     * Get ancre
     *
     * @return \AppBundle\Entity\SousPage
     */
    public function getAncre()
    {
        return $this->ancre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ChampActualiteContent
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
     * Set image
     *
     * @param \AppBundle\Entity\ChampImage $image
     *
     * @return ChampActualiteContent
     */
    public function setImage(\AppBundle\Entity\ChampImage $image = null)
    {
        $image->setPosition(1);
        if($image->getImage() == "")
            $image->setImage("news.png");
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \AppBundle\Entity\ChampImage
     */
    public function getImage()
    {
        return $this->image;
    }
}
