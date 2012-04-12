<?php

namespace App\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * App\TestBundle\Entity\AuthUser
 */
class AuthUser implements UserInterface
{
    
    //バリデーション
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('username', new NotBlank());
    }
    
    
    /**
     * @var integer $authUserId
     */
    private $authUserId;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $salt
     */
    private $salt;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var App\TestBundle\Entity\AuthRole
     */
    private $authRole;


    /**
     * Get authUserId
     *
     * @return integer 
     */
    public function getAuthUserId()
    {
        return $this->authUserId;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set authRole
     *
     * @param App\TestBundle\Entity\AuthRole $authRole
     */
    public function setAuthRole(\App\TestBundle\Entity\AuthRole $authRole)
    {
        $this->authRole = $authRole;
    }

    /**
     * Get authRole
     *
     * @return App\TestBundle\Entity\AuthRole 
     */
    public function getAuthRole()
    {
        return $this->authRole;
    }



    public function getRoles()
    {
//        return array('ROLE_ADMIN');
	return array($this->authRole->getName());
    }

    public function eraseCredentials()
    {
        
    }

    public function equals(UserInterface $user)
    {
        return $this->getUsername() == $user->getUsername();
    }

    /**
     * @var string $aaa
     */
    private $aaa;


    /**
     * Set aaa
     *
     * @param string $aaa
     */
    public function setAaa($aaa)
    {
        $this->aaa = $aaa;
    }

    /**
     * Get aaa
     *
     * @return string 
     */
    public function getAaa()
    {
        return $this->aaa;
    }
}