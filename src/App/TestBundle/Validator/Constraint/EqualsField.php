<?php
namespace App\TestBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 *
 * @api
 */
class EqualsField extends Constraint
{
    public $message = 'This value does not equal the {{ field }} field';
    public $field;
    
    /**
     * {@inheritDoc}
     */
    public function getDefaultOption()
    {
        return 'field';
    }

    public function getRequiredOptions()
    {
        return array('field');
    }
}

?>
