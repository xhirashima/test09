<?php
namespace App\TestBundle\Lib;

use App\TestBundle\Entity\AuthUser;

/**
 * 認証管理クラス
 *
 * @author fhirashima
 */
class AuthenticationMng
{
    /**
     * ユーザー新規登録 
     * @param App\TestBundle\Entity\AuthUser $user 
     */
    public function insertUser(App\TestBundle\Entity\AuthUser $user)
    {
        
    }
    
    /**
     * ユーザー新規登録 formから
     * @param App\TestBundle\Form\Data\AuthUserFormData $userform 
     */
    public function  insertUserForm(App\TestBundle\Form\Data\AuthUserFormData $userform)
    {
        $authuser = new AuthUser();
        
        //formからdataに変換
        $authuser->setUsername($userform->getUsername());
        $authuser->setPassword($userform->getPassword());
        $authuser->setSalt('');
        $authuser->setAuthRole($userform->getAuthRole());
        
        $this->insertUser($authuser);
    }
}

?>
