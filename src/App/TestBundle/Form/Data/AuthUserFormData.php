<?php
namespace App\TestBundle\Form\Data;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of AuthUserFormData
 *
 * @author fhirashima
 */
class AuthUserFormData
{
    /**
     * ユーザー名
     * @var type 
     * 
     * @Assert\NotBlank()
     * @Assert\MaxLength(10)
     */
    private $username;
    
    /**
     * パスワード
     * @var type 
     * 
     * @Assert\NotBlank()
     */
    private $password;
    
    /**
     * ロール
     * @var type 
     * 
     * @Assert\NotBlank()
     */
    private $authRole;
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
        public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
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
}

?>
