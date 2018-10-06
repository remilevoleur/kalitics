<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampImage
 *
 * @ORM\Table(name="champ_image")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampImageRepository")
 */
class ChampImage extends Composant
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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $lien;

    /**
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bloc_id", referencedColumnName="id")
     * })
     */
    protected $bloc;

    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="ChampEncart", inversedBy="champImage")
     * @ORM\JoinColumn(name="champEncart_id", referencedColumnName="id")
     */
    private $champEncart;

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
     * @var date
     *
     * @ORM\Column(name="date", type="datetime", length=255)
     */
    private $date; 

    /**
     * Set image
     *
     * @param string $image
     *
     * @return ChampImage
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampImage
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return ChampImage
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
     * Set lien
     *
     * @param string $lien
     *
     * @return ChampImage
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
     * Set champEncart
     *
     * @param \AppBundle\Entity\ChampEncart $champEncart
     *
     * @return ChampImage
     */
    public function setChampEncart(\AppBundle\Entity\ChampEncart $champEncart = null)
    {
        $this->champEncart = $champEncart;

        return $this;
    }

    /**
     * Get champEncart
     *
     * @return \AppBundle\Entity\ChampEncart
     */
    public function getChampEncart()
    {
        return $this->champEncart;
    }
}
