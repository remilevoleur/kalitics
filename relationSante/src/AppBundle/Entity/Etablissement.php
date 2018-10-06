<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hopital
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtablissementRepository")
 */
class Etablissement
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
     * @ORM\Column(name="tel", type="string", length=20)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=40)
     */
    private $mail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=50)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=50)
     */
    private $latitude;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Demande", mappedBy="etablissement")
     */
    private $demandes;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tel.
     *
     * @param string $tel
     *
     * @return Hopital
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel.
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail.
     *
     * @param string $mail
     *
     * @return Hopital
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail.
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set fax.
     *
     * @param string|null $fax
     *
     * @return Hopital
     */
    public function setFax($fax = null)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax.
     *
     * @return string|null
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Hopital
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->demandes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add demande.
     *
     * @param \AppBundle\Entity\Demande $demande
     *
     * @return Etablissement
     */
    public function addDemande(\AppBundle\Entity\Demande $demande)
    {
        $this->demandes[] = $demande;

        return $this;
    }

    /**
     * Remove demande.
     *
     * @param \AppBundle\Entity\Demande $demande
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDemande(\AppBundle\Entity\Demande $demande)
    {
        return $this->demandes->removeElement($demande);
    }

    /**
     * Get demandes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemandes()
    {
        return $this->demandes;
    }

    /**
     * Set long.
     *
     * @param string $long
     *
     * @return Etablissement
     */
    public function setLongitude($long)
    {
        $this->longitude = $long;

        return $this;
    }

    /**
     * Get long.
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set lat.
     *
     * @param string $lat
     *
     * @return Etablissement
     */
    public function setLatitude($lat)
    {
        $this->latitude = $lat;

        return $this;
    }

    /**
     * Get lat.
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
