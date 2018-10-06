<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

/**
 * ChampActualite
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class ChampActualite extends Composant
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
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsActualite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bloc_id", referencedColumnName="id")
     * })
     */
    protected $bloc;

    /**
     * @var int
     *
     * @ORM\Column(name="limite", type="integer")
     */
    protected $limite;    

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ChampActualiteContent", mappedBy="champActualite", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"date" = "DESC"})
     */
    private $champsActualiteContent;   

    private $em;


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
     * Constructor
     */
    public function __construct()
    {
        $this->champsActualiteContent = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\PostLoad
     * @ORM\PostPersist
     */
    public function fetchEntityManager(LifecycleEventArgs $args)
    {
        $this->em = $args->getEntityManager();
    }

    /**
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampActualite
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
     * Add champsActualiteContent
     *
     * @param \AppBundle\Entity\ChampActualiteContent $champsActualiteContent
     *
     * @return ChampActualite
     */
    public function addChampsActualiteContent(\AppBundle\Entity\ChampActualiteContent $champsActualiteContent)
    {
        $this->champsActualiteContent[] = $champsActualiteContent;

        $champsActualiteContent->setChampActualite($this);

        return $this;
    }

    /**
     * Remove champsActualiteContent
     *
     * @param \AppBundle\Entity\ChampActualiteContent $champsActualiteContent
     */
    public function removeChampsActualiteContent(\AppBundle\Entity\ChampActualiteContent $champsActualiteContent)
    {
        if($this->bloc->getPosition() == "centre")
            $this->champsActualiteContent->removeElement($champsActualiteContent);
    }

    /**
     * Get champsActualiteContent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChampsActualiteContent()
    {
        if(!is_null($this->em)){     
            $em = $this->em;

            $query = $em->createQuery(
                'SELECT a
                FROM AppBundle\Entity\ChampActualiteContent a
                ORDER BY a.date DESC'
            );

            $query->setMaxResults($this->limite);

            // returns an array of Product objects
            return $query->execute();
        }
    }

    /**
     * Set limite
     *
     * @param integer $limite
     *
     * @return ChampActualite
     */
    public function setLimite($limite)
    {
        $this->limite = $limite;

        return $this;
    }

    /**
     * Get limite
     *
     * @return integer
     */
    public function getLimite()
    {
        return $this->limite;
    }
}
