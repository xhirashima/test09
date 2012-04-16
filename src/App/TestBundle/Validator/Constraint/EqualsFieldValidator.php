<?php
namespace App\TestBundle\Validator\Constraint;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * field queal check validation
 *
 * @author fhirashima
 */
class EqualsFieldValidator extends ConstraintValidator
{
    /**
     * Checks if the passed value is valid.
     *
     * @param mixed      $value      The value that should be validated
     * @param Constraint $constraint The constrain for the validation
     *
     * @return Boolean Whether or not the value is valid
     */
    public function isValid($value, Constraint $constraint)
    {
        if ($value !== $this->context->getRoot()->get($constraint->field)->getData())
        {
            $this->setMessage($constraint->message, array(
                '{{ field }}' => $constraint->field,
            ));
            return false;
        }
        
        return true;
    }
}

?>
