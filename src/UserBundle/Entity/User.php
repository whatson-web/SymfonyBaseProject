<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use WH\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="WH\UserBundle\Repository\UserRepository")
 *
 * Class User
 *
 * @package WH\UserBundle\Entity
 */
class User extends BaseUser
{

}
