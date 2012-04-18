<?php
namespace App\TestBundle\Form\Data;

use Symfony\Component\Validator\Constraints as Assert;
use App\TestBundle\Validator\Constraint\EqualsField;
use Symfony\Component\Validator\ExecutionContext;

/**
 * Description of AuthUserFormData
 *
 * @author fhirashima
 * @Assert\Callback(methods={"shouldValidUniqeUserName"})
 */
class AuthUserFormData
{
    //
    /**
     * ユーザー名　ユニークバリデーション
     * @param ExecutionContext $context 
     */
    public function shouldValidUniqeUserName(ExecutionContext $context)
    {
        if(true)
        {
            $propertyPath = $context->getPropertyPath() . '.username';//プロパティーパス取得
            $context->setPropertyPath($propertyPath);//プロパティーパス設定
            $context->addViolation('usernameはユニークです', array(), null);//エラーメッセージ設定
        }
    }
    //
    
    /**
     * ユーザー名
     * @var type 
     * 
     * @Assert\NotBlank()
     * @Assert\MaxLength(limit = 10)
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
     * @EqualsField(field = "password", message = "The password and confirmation password do not match")
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
