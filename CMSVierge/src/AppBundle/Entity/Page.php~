<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageRepository")
 */
class Page
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
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SousPage", mappedBy="page", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $sousPages;

    /**
     * @var \Site
     *
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="pages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     * })
     */
    private $site;

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
        $this->sousPages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Page
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add sousPage
     *
     * @param \AppBundle\Entity\SousPage $sousPage
     *
     * @return Page
     */
    public function addSousPage(\AppBundle\Entity\SousPage $sousPage)
    {
        $sousPage->setPage($this);
        $this->sousPages[] = $sousPage;

        return $this;
    }

    /**
     * Remove sousPage
     *
     * @param \AppBundle\Entity\SousPage $sousPage
     */
    public function removeSousPage(\AppBundle\Entity\SousPage $sousPage)
    {
        $this->sousPages->removeElement($sousPage);
    }

    /**
     * Get sousPages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSousPages()
    {
        return $this->sousPages;
    }

    /**
     * Set site
     *
     * @param \AppBundle\Entity\Site $site
     *
     * @return Page
     */
    public function setSite(\AppBundle\Entity\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \AppBundle\Entity\Site
     */
    public function getSite()
    {
        return $this->site;
    }
}
