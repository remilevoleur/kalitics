<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampTexte
 *
 * @ORM\Entity
 */
class ChampTexte extends Composant
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
     * @var date
     *
     * @ORM\Column(name="date", type="datetime", length=255)
     */
    private $date; 

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="sousTitre", type="string", length=255, nullable=true)
     */
    private $sousTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="text", nullable=true)
     */
    private $texte;

    /**
     * @var string
     *
     * @ORM\Column(name="fin", type="text", nullable=true)
     */
    private $fin;   

    /**
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsTexte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bloc_id", referencedColumnName="id")
     * })
     */
    protected $bloc; 

    /**
     * One Cart has One Customer.
     * @ORM\OneToOne(targetEntity="ChampEncart", inversedBy="champTexte")
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
     * Set titre
     *
     * @param string $titre
     *
     * @return ChampTexte
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
     * @return ChampTexte
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
     * Set fin
     *
     * @param string $fin
     *
     * @return ChampTexte
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return string
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set sousTitre
     *
     * @param string $sousTitre
     *
     * @return ChampTexte
     */
    public function setSousTitre($sousTitre)
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    /**
     * Get sousTitre
     *
     * @return string
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampTexte
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
     * @return ChampTexte
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
     * Set champEncart
     *
     * @param \AppBundle\Entity\ChampEncart $champEncart
     *
     * @return ChampTexte
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
