<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="IDX_14B784184419DE7D", columns={"bibliotheque_id"})})
 * @ORM\Entity
 */
class Photo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \Bibliotheque
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque", inversedBy="photos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bibliotheque_id", referencedColumnName="id")
     * })
     */
    private $bibliotheque;



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
     * Set nom
     *
     * @param string $nom
     *
     * @return Photo
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set bibliotheque
     *
     * @param \BUBundle\Entity\Bibliotheque $bibliotheque
     *
     * @return Photo
     */
    public function setBibliotheque(\BUBundle\Entity\Bibliotheque $bibliotheque = null)
    {
        $this->bibliotheque = $bibliotheque;

        return $this;
    }

    /**
     * Get bibliotheque
     *
     * @return \BUBundle\Entity\Bibliotheque
     */
    public function getBibliotheque()
    {
        return $this->bibliotheque;
    }
}
