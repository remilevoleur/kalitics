<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampTitre
 *
 * @ORM\Table(name="champ_titre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampTitreRepository")
 */
class ChampTitre extends Composant
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
     * @ORM\Column(name="titrePage", type="text")
     */
    private $titrePage;

    /**
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsTitre")
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
     * Set titrePage
     *
     * @param string $titrePage
     *
     * @return ChampTitre
     */
    public function setTitrePage($titrePage)
    {
        $this->titrePage = $titrePage;

        return $this;
    }

    /**
     * Get titrePage
     *
     * @return string
     */
    public function getTitrePage()
    {
        return $this->titrePage;
    }

    /**
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampTitre
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
}
