<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SiteRepository")
 */
class Site
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Page", mappedBy="site", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $pages;  

    /**
     * @ORM\OneToOne(targetEntity="Message")
     * @ORM\JoinColumn(name="message_id", referencedColumnName="id")
     */
    private $message; 

    /**
     * @var string
     *
     * @ORM\Column(name="mailContact", type="string", length=255)
     */
    private $mailContact;

    /**
     * @var string
     *
     * @ORM\Column(name="fichierHelp", type="string", length=255)
     */
    private $fichierHelp;

    /**
     * @var string
     *
     * @ORM\Column(name="mailDevis", type="string", length=255)
     */
    private $mailDevis;


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
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return Site
     */
    public function addPage(\AppBundle\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \AppBundle\Entity\Page $page
     */
    public function removePage(\AppBundle\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set message
     *
     * @param \AppBundle\Entity\Message $message
     *
     * @return Site
     */
    public function setMessage(\AppBundle\Entity\Message $message = null)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return \AppBundle\Entity\Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set mailContact
     *
     * @param string $mailContact
     *
     * @return Site
     */
    public function setMailContact($mailContact)
    {
        $this->mailContact = $mailContact;

        return $this;
    }

    /**
     * Get mailContact
     *
     * @return string
     */
    public function getMailContact()
    {
        return $this->mailContact;
    }

    /**
     * Set mailDevis
     *
     * @param string $mailDevis
     *
     * @return Site
     */
    public function setMailDevis($mailDevis)
    {
        $this->mailDevis = $mailDevis;

        return $this;
    }

    /**
     * Get mailDevis
     *
     * @return string
     */
    public function getMailDevis()
    {
        return $this->mailDevis;
    }

    /**
     * Set fichierHelp
     *
     * @param string $fichierHelp
     *
     * @return Site
     */
    public function setFichierHelp($fichierHelp)
    {
        $this->fichierHelp = $fichierHelp;

        return $this;
    }

    /**
     * Get fichierHelp
     *
     * @return string
     */
    public function getFichierHelp()
    {
        return $this->fichierHelp;
    }
}
