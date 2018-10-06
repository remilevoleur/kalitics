<?php

namespace BUBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bibliotheque
 *
 * @ORM\Table(name="bibliotheque")
 * @ORM\Entity
 */
class Bibliotheque
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
     * @ORM\Column(name="nom_principal", type="string", length=255, nullable=false)
     */
    private $nomPrincipal;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_secondaire", type="string", length=255, nullable=false)
     */
    private $nomSecondaire;

    /**
     * @var string
     *
     * @ORM\Column(name="site_web", type="string", length=255, nullable=true)
     */
    private $siteWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="acces", type="string", length=255, nullable=false)
     */
    private $acces;

    /**
     * @var boolean
     *
     * @ORM\Column(name="emprunt", type="boolean", nullable=false)
     */
    private $emprunt;

    /**
     * @var integer
     *
     * @ORM\Column(name="places", type="integer", nullable=false)
     */
    private $places;

    /**
     * @var string
     *
     * @ORM\Column(name="url_catalogue", type="string", length=255, nullable=true)
     */
    private $urlCatalogue;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_jrs_reservation", type="integer", nullable=false)
     */
    private $nbJrsReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=false)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;    

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="bibliotheque")
     * @ORM\JoinTable(name="service_bibliotheque",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bibliotheque_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     *   }
     * )
     */
    private $service;

    /**
     * @ORM\OneToMany(targetEntity="BUBundle\Entity\Photo", mappedBy="bibliotheque", cascade={"remove"}, orphanRemoval=true)
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity="BUBundle\Entity\Horaire", mappedBy="bibliotheque", cascade={"remove"}, orphanRemoval=true)
     */
    private $horaires;

    /**
     * @ORM\OneToMany(targetEntity="BUBundle\Entity\HoraireExceptionnel", mappedBy="bibliotheque", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"jourDebut" = "ASC"})
     */
    private $horairesExceptionnel;

    /**
     * @ORM\OneToMany(targetEntity="BUBundle\Entity\Message", mappedBy="bibliotheque", cascade={"persist"}, orphanRemoval=true)
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="BUBundle\Entity\Salle", mappedBy="bibliotheque", cascade={"persist"}, orphanRemoval=true)
     */
    private $salles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addHoraire(new Horaire("lundi", $this));
        $this->addHoraire(new Horaire("mardi", $this));
        $this->addHoraire(new Horaire("mercredi", $this));
        $this->addHoraire(new Horaire("jeudi", $this));
        $this->addHoraire(new Horaire("vendredi", $this));
        $this->addHoraire(new Horaire("samedi", $this));
        $this->addHoraire(new Horaire("dimanche", $this));
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
     * Set nomPrincipal
     *
     * @param string $nomPrincipal
     *
     * @return Bibliotheque
     */
    public function setNomPrincipal($nomPrincipal)
    {
        $this->nomPrincipal = $nomPrincipal;

        return $this;
    }

    /**
     * Get nomPrincipal
     *
     * @return string
     */
    public function getNomPrincipal()
    {
        return $this->nomPrincipal;
    }

    /**
     * Set nomSecondaire
     *
     * @param string $nomSecondaire
     *
     * @return Bibliotheque
     */
    public function setNomSecondaire($nomSecondaire)
    {
        $this->nomSecondaire = $nomSecondaire;

        return $this;
    }

    /**
     * Get nomSecondaire
     *
     * @return string
     */
    public function getNomSecondaire()
    {
        return $this->nomSecondaire;
    }

    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Bibliotheque
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    /**
     * Set acces
     *
     * @param string $acces
     *
     * @return Bibliotheque
     */
    public function setAcces($acces)
    {
        $this->acces = $acces;

        return $this;
    }

    /**
     * Get acces
     *
     * @return string
     */
    public function getAcces()
    {
        return $this->acces;
    }

    /**
     * Set emprunt
     *
     * @param boolean $emprunt
     *
     * @return Bibliotheque
     */
    public function setEmprunt($emprunt)
    {
        $this->emprunt = $emprunt;

        return $this;
    }

    /**
     * Get emprunt
     *
     * @return boolean
     */
    public function getEmprunt()
    {
        return $this->emprunt;
    }

    /**
     * Set places
     *
     * @param integer $places
     *
     * @return Bibliotheque
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return integer
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Set urlCatalogue
     *
     * @param string $urlCatalogue
     *
     * @return Bibliotheque
     */
    public function setUrlCatalogue($urlCatalogue)
    {
        $this->urlCatalogue = $urlCatalogue;

        return $this;
    }

    /**
     * Get urlCatalogue
     *
     * @return string
     */
    public function getUrlCatalogue()
    {
        return $this->urlCatalogue;
    }

    /**
     * Set nbJrsReservation
     *
     * @param integer $nbJrsReservation
     *
     * @return Bibliotheque
     */
    public function setNbJrsReservation($nbJrsReservation)
    {
        $this->nbJrsReservation = $nbJrsReservation;

        return $this;
    }

    /**
     * Get nbJrsReservation
     *
     * @return integer
     */
    public function getNbJrsReservation()
    {
        return $this->nbJrsReservation;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Bibliotheque
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Bibliotheque
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Bibliotheque
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add service
     *
     * @param \BUBundle\Entity\Service $service
     *
     * @return Bibliotheque
     */
    public function addService(\BUBundle\Entity\Service $service)
    {
        $this->service[] = $service;

        return $this;
    }

    /**
     * Remove service
     *
     * @param \BUBundle\Entity\Service $service
     */
    public function removeService(\BUBundle\Entity\Service $service)
    {
        $this->service->removeElement($service);
    }

    /**
     * Get service
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Add photo
     *
     * @param \BUBundle\Entity\Photo $photo
     *
     * @return Bibliotheque
     */
    public function addPhoto(\BUBundle\Entity\Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \BUBundle\Entity\Photo $photo
     */
    public function removePhoto(\BUBundle\Entity\Photo $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add horaire
     *
     * @param \BUBundle\Entity\Horaire $horaire
     *
     * @return Bibliotheque
     */
    public function addHoraire(\BUBundle\Entity\Horaire $horaire)
    {
        $this->horaires[] = $horaire;

        return $this;
    }

    /**
     * Remove horaire
     *
     * @param \BUBundle\Entity\Horaire $horaire
     */
    public function removeHoraire(\BUBundle\Entity\Horaire $horaire)
    {
        $this->horaires->removeElement($horaire);
    }

    /**
     * Get horaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHoraires()
    {
        return $this->horaires;
    }

    /**
     * Add horairesExceptionnel
     *
     * @param \BUBundle\Entity\HoraireExceptionnel $horairesExceptionnel
     *
     * @return Bibliotheque
     */
    public function addHorairesExceptionnel(\BUBundle\Entity\HoraireExceptionnel $horairesExceptionnel)
    {
        $this->horairesExceptionnel[] = $horairesExceptionnel;

        $horairesExceptionnel->setBibliotheque($this);

        return $this;
    }

    /**
     * Remove horairesExceptionnel
     *
     * @param \BUBundle\Entity\HoraireExceptionnel $horairesExceptionnel
     */
    public function removeHorairesExceptionnel(\BUBundle\Entity\HoraireExceptionnel $horairesExceptionnel)
    {
        $this->horairesExceptionnel->removeElement($horairesExceptionnel);
    }

    /**
     * Get horairesExceptionnel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHorairesExceptionnel()
    {
        return $this->horairesExceptionnel;
    }

    /**
     * Add message
     *
     * @param \BUBundle\Entity\Message $message
     *
     * @return Bibliotheque
     */
    public function addMessage(\BUBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \BUBundle\Entity\Message $message
     */
    public function removeMessage(\BUBundle\Entity\Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        $newMessages = null;
        foreach($this->messages as $message){
            if($message->getDateFin() > new \DateTime())
                $newMessages[] = $message;
        }
        return $newMessages;
    }    

    /**
     * Add salle
     *
     * @param \BUBundle\Entity\Salle $salle
     *
     * @return Bibliotheque
     */
    public function addSalle(\BUBundle\Entity\Salle $salle)
    {
        $this->salles[] = $salle;

        $salle->setBibliotheque($this);

        return $this;
    }

    /**
     * Remove salle
     *
     * @param \BUBundle\Entity\Salle $salle
     */
    public function removeSalle(\BUBundle\Entity\Salle $salle)
    {
        $this->salles->removeElement($salle);
    }

    /**
     * Get salles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSalles()
    {
        return $this->salles;
    }
}
