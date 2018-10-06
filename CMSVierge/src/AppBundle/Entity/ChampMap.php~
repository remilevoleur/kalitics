<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampMap
 *
 * @ORM\Entity
 */
class ChampMap extends Composant
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
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsMap")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bloc_id", referencedColumnName="id")
     * })
     */
    protected $bloc;

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="datetime", length=255)
     */
    private $date; 


    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return ChampMap
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampMap
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
     * @return ChampMap
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
}
