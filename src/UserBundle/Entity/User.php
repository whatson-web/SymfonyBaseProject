<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WH\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 *
 * Class User
 *
 * @package UserBundle\Entity
 */
class User extends BaseUser
{
}
