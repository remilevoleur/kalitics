<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampEncart
 *
 * @ORM\Table(name="champ_encart")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampEncartRepository")
 */
class ChampEncart extends Composant
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
     * @ORM\OneToOne(targetEntity="ChampTexte", mappedBy="champEncart", cascade={"persist"}, orphanRemoval=true)
     */
    private $champTexte;

    /**
     * @ORM\OneToOne(targetEntity="ChampImage", mappedBy="champEncart", cascade={"persist"}, orphanRemoval=true)
     */
    private $champImage;

    /**
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsEncart")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bloc_id", referencedColumnName="id")
     * })
     */
    protected $bloc;

    /**
     * @var string
     *
     * @ORM\Column(name="positionImage", type="string", length=255)
     */
    private $positionImage;

    /**
     * @var string
     *
     * @ORM\Column(name="encartCouleur", type="string", length=255)
     */
    private $encartCouleur;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255)
     */
    private $couleur;

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
     * Set champTexte
     *
     * @param \AppBundle\Entity\ChampTexte $champTexte
     *
     * @return ChampEncart
     */
    public function setChampTexte(\AppBundle\Entity\ChampTexte $champTexte = null)
    {
        $champTexte->setPosition(1);
        $champTexte->setChampEncart($this);
        $this->champTexte = $champTexte;

        return $this;
    }

    /**
     * Get champTexte
     *
     * @return \AppBundle\Entity\ChampTexte
     */
    public function getChampTexte()
    {
        return $this->champTexte;
    }

    /**
     * Set champImage
     *
     * @param \AppBundle\Entity\ChampImage $champImage
     *
     * @return ChampEncart
     */
    public function setChampImage(\AppBundle\Entity\ChampImage $champImage = null)
    {
        $champImage->setPosition(1);
        $champImage->setChampEncart($this);
        $this->champImage = $champImage;

        return $this;
    }

    /**
     * Get champImage
     *
     * @return \AppBundle\Entity\ChampImage
     */
    public function getChampImage()
    {
        return $this->champImage;
    }

    /**
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampEncart
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
     * Set encartCouleur
     *
     * @param string $encartCouleur
     *
     * @return ChampEncart
     */
    public function setEncartCouleur($encartCouleur)
    {
        $this->encartCouleur = $encartCouleur;

        return $this;
    }

    /**
     * Get encartCouleur
     *
     * @return string
     */
    public function getEncartCouleur()
    {
        return $this->encartCouleur;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return ChampEncart
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set positionImage
     *
     * @param string $positionImage
     *
     * @return ChampEncart
     */
    public function setPositionImage($positionImage)
    {
        $this->positionImage = $positionImage;

        return $this;
    }

    /**
     * Get positionImage
     *
     * @return string
     */
    public function getPositionImage()
    {
        return $this->positionImage;
    }
}
