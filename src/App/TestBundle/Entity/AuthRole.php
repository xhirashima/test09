<?php

namespace App\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * App\TestBundle\Entity\AuthRole
 */
class AuthRole implements RoleInterface
{
    /**
     * @var integer $authRoleId
     */
    protected $authRoleId;

    /**
     * @var string $name
     */
    protected $name;


    /**
     * Get authRoleId
     *
     * @return integer 
     */
    public function getAuthRoleId()
    {
        return $this->authRoleId;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }









    public function getRole()
    {
        return $this->getName();
    }


}