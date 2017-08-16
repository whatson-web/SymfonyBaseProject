<?php

namespace CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="CmsBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\ManyToOne(targetEntity="CmsBundle\Entity\Page", cascade={"persist", "remove"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

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
     * Set email
     *
     * @param string $email
     *
     * @return Contact
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
     * Set page
     *
     * @param \CmsBundle\Entity\Page $page
     *
     * @return Contact
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
}
