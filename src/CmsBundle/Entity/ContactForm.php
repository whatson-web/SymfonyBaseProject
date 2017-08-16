<?php

namespace CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ContactForm
 *
 * @ORM\Table(name="contact_form")
 * @ORM\Entity()
 */
class ContactForm
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
     * @Assert\NotBlank(message="Ce champ est requis")
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Ce champ est requis")
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Ce champ est requis")
     * @Assert\Email(message="Ce champ doit être un email valide")
     * @ORM\Column(name="$email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return ContactForm
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return ContactForm
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return ContactForm
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
     * Set message
     *
     * @param string $message
     *
     * @return ContactForm
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
