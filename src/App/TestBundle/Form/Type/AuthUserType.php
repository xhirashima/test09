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
    }
    
    public function getName()
    {
        return 'AuthUser';
    }
}

?>
