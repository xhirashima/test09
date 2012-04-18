<?php
namespace App\TestBundle\Form\Data;

use Symfony\Component\Validator\Constraints as Assert;
use App\TestBundle\Validator\Constraint\EqualsField;
use Symfony\Component\Validator\ExecutionContext;
use Doctrine\ORM\EntityManager;

/**
 * Description of AuthUserFormData
 *
 * @author fhirashima
 * @Assert\Callback(methods={"shouldValidUniqeUserName"})
 */
class AuthUserFormData
{
    
    /**
     *
     * @var Doctrine\ORM\EntityManager 
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    //
    /**
     * ユーザー名　ユニークバリデーション
     * @param ExecutionContext $context 
     */
    public function shouldValidUniqeUserName(ExecutionContext $context)
    {
        $authuser = $this->em->getRepository('AppTestBundle:AuthUser')->findBy(
                    array('username' => $this->getUsername())
                );
        
        if(count($authuser) != 0)
        {
            $propertyPath = $context->getPropertyPath() . '.username';//プロパティーパス取得
            $context->setPropertyPath($propertyPath);//プロパティーパス設定
            $context->addViolation('すでに'.$this->getUsername().'は登録されています。他のusernameを設定して下さい。', array(), null);//エラーメッセージ設定
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
