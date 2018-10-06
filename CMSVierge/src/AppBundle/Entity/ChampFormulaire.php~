<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChampFormulaire
 *
 * @ORM\Table(name="champ_formulaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChampFormulaireRepository")
 */
class ChampFormulaire extends Composant
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
     * @var \Bloc
     *
     * @ORM\ManyToOne(targetEntity="Bloc", inversedBy="champsFormulaire")
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
     * Set bloc
     *
     * @param \AppBundle\Entity\Bloc $bloc
     *
     * @return ChampFormulaire
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
