<?php
namespace App\TestBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * AuthUserフォームクラス
 *
 * @author fhirashima
 */
class AuthUserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('username', 'text');
        $builder->add('password', 'password');
        $builder->add('password_confirmation', 'password');
        $builder->add('authrole', 'entity', array(
            'class' => 'App\TestBundle\Entity\AuthRole',
            'property' => 'name',
            ));
    }
    
    public function getName()
    {
        return 'AuthUser';
    }
}

?>
