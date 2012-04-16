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
    //
    /**
     * パスワードチェック
     * @Assert\True(message = "The password and confirmation password do not match")
     */
    public function isPasswordEqualToConfirmationPassword()
    {
        return ($this->password === $this->password_confirmation);
    }
    //
    
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
     * パスワード確認
     * @var type 
     * 
     * @Assert\NotBlank()
     */
    private $password_confirmation;
    
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
    
    public function getPasswordConfirmation()
    {
        return $this->password_confirmation;
    }
    
    public function setPasswordConfirmation($password_confirmation)
    {
        $this->password_confirmation = $password_confirmation;
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
