<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="bandeauMessage", type="string", length=255)
     */
    private $bandeauMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="messageCouleur", type="string", length=255)
     */
    private $messageCouleur;

    /**
     * @var date
     *
     * @ORM\Column(name="datePublication", type="datetime", length=255)
     */
    private $datePublication;

    /**
     * @var date
     *
     * @ORM\Column(name="dateFinPublication", type="datetime", length=255)
     */
    private $dateFinPublication;

    /**
     * @ORM\OneToOne(targetEntity="SousPage")
     * @ORM\JoinColumn(name="sousPage_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $ancre;


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
     * Get date
     *
     * @return \DateTime
     */
    public function getDateCachee()
    {
        return $this->datePublication;
    }

    /**
     * Set date
     *
     * @param \DateTime $datePublication
     *
     * @return ChampActualiteContent
     */
    public function setDateCachee($datePublication)
    {
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDateCacheeFin()
    {
        return $this->dateFinPublication;
    }

    /**
     * Set date
     *
     * @param \DateTime $datePublication
     *
     * @return ChampActualiteContent
     */
    public function setDateCacheeFin($dateFinPublication)
    {
        return $this;
    }

    /**
     * Set bandeauMessage
     *
     * @param string $bandeauMessage
     *
     * @return Message
     */
    public function setBandeauMessage($bandeauMessage)
    {
        $this->bandeauMessage = $bandeauMessage;

        return $this;
    }

    /**
     * Get bandeauMessage
     *
     * @return string
     */
    public function getBandeauMessage()
    {
        return $this->bandeauMessage;
    }

    /**
     * Set messageCouleur
     *
     * @param string $messageCouleur
     *
     * @return Message
     */
    public function setMessageCouleur($messageCouleur)
    {
        $this->messageCouleur = $messageCouleur;

        return $this;
    }

    /**
     * Get messageCouleur
     *
     * @return string
     */
    public function getMessageCouleur()
    {
        return $this->messageCouleur;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Message
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set dateFinPublication
     *
     * @param \DateTime $dateFinPublication
     *
     * @return Message
     */
    public function setDateFinPublication($dateFinPublication)
    {
        $this->dateFinPublication = $dateFinPublication;

        return $this;
    }

    /**
     * Get dateFinPublication
     *
     * @return \DateTime
     */
    public function getDateFinPublication()
    {
        return $this->dateFinPublication;
    }

    /**
     * Set ancre
     *
     * @param \AppBundle\Entity\SousPage $ancre
     *
     * @return Message
     */
    public function setAncre(\AppBundle\Entity\SousPage $ancre = null)
    {
        $this->ancre = $ancre;

        return $this;
    }

    /**
     * Get ancre
     *
     * @return \AppBundle\Entity\SousPage
     */
    public function getAncre()
    {
        return $this->ancre;
    }
}
