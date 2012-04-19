<?php
namespace App\TestBundle\Lib;

use Doctrine\ORM\EntityManager;
use App\TestBundle\Entity\AuthUser;

/**
 * 認証管理クラス
 *
 * @author fhirashima
 */
class AuthenticationMng
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

    /**
     * ユーザー新規登録 
     * @param App\TestBundle\Entity\AuthUser $authuser 
     */
    public function insertUser($authuser)
    {
        $this->em->persist($authuser);
        $this->em->flush();
    }
    
    /**
     * ユーザー新規登録 formから
     * @param App\TestBundle\Form\Data\AuthUserFormData $userform 
     */
    public function  insertUserForm($userform)
    {
        $authuser = new AuthUser();
        
        //formからdataに変換
        $authuser->setUsername($userform->getUsername());
        $authuser->setPassword($userform->getPassword());
        $authuser->setSalt('');
        $authuser->setAuthRole($userform->getAuthRole());
        
        $this->insertUser($authuser);
    }
    
    /**
     * usernameユニークチェック
     * @param type $username
     * @return boolean 
     */
    public function isUsernameUnique($username)
    {
        $authuser = $this->em->getRepository('AppTestBundle:AuthUser')->findBy(array('username' => $username));
        if(count($authuser) > 0)
        {
            return false;
        }
        return true;
    }
}

?>
