<?php

namespace CmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Home
 *
 * @ORM\Table(name="home")
 * @ORM\Entity(repositoryClass="CmsBundle\Repository\HomeRepository")
 */
class Home
{
    /**
     * Add portfolioFile
     *
     * @param \CmsBundle\Entity\HomeFile $portfolioFile
     *
     * @return Home
     */
    public function addPortfolioFile(\CmsBundle\Entity\HomeFile $portfolioFile)
    {
        $portfolioFile->setHomePortfolio($this);
        $this->portfolioFiles[] = $portfolioFile;

        return $this;
    }

    /**
     * Remove portfolioFile
     *
     * @param \CmsBundle\Entity\HomeFile $portfolioFile
     */
    public function removePortfolioFile(\CmsBundle\Entity\HomeFile $portfolioFile)
    {
        $portfolioFile->setHomePortfolio(null);
        $this->portfolioFiles->removeElement($portfolioFile);
    }

    /**
     * Home constructor.
     */
    public function __construct()
    {
        $this->portfolioFiles = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="CmsBundle\Entity\Page", cascade={"persist", "remove"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $page;

    /**
     * @ORM\OneToMany(targetEntity="CmsBundle\Entity\HomeFile", cascade={"persist", "remove"}, mappedBy="homePortfolio")
     * @ORM\OrderBy({"position"="DESC"})
     */
    private $portfolioFiles;

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
     * Set page
     *
     * @param \CmsBundle\Entity\Page $page
     *
     * @return Home
     */
    public function setPage(\CmsBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \CmsBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Get portfolioFiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPortfolioFiles()
    {
        return $this->portfolioFiles;
    }
}
