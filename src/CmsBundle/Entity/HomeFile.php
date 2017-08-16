<?php

namespace CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WH\LibBundle\Entity\Position;

/**
 * HomeFile
 *
 * @ORM\Table(name="home_file")
 * @ORM\Entity(repositoryClass="CmsBundle\Repository\HomeFileRepository")
 */
class HomeFile
{
    use Position {
        Position::__construct as protected __positionConstruct;
    }

    /**
     * HomeFile constructor.
     */
    public function __construct()
    {
        $this->__positionConstruct();
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
     * @ORM\ManyToOne(targetEntity="WH\MediaBundle\Entity\File", cascade={"persist", "remove"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity="CmsBundle\Entity\Home", inversedBy="portfolioFiles")
     */
    private $homePortfolio;

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
     * Set file
     *
     * @param \WH\MediaBundle\Entity\File $file
     *
     * @return HomeFile
     */
    public function setFile(\WH\MediaBundle\Entity\File $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \WH\MediaBundle\Entity\File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set homePortfolio
     *
     * @param \CmsBundle\Entity\Home $homePortfolio
     *
     * @return HomeFile
     */
    public function setHomePortfolio(\CmsBundle\Entity\Home $homePortfolio = null)
    {
        $this->homePortfolio = $homePortfolio;

        return $this;
    }

    /**
     * Get homePortfolio
     *
     * @return \CmsBundle\Entity\Home
     */
    public function getHomePortfolio()
    {
        return $this->homePortfolio;
    }
}
