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
     * @Assert\MaxLength(5)
     */
    private $username;
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
}

?>
