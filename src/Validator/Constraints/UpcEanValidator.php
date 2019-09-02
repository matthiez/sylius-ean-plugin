<?php
declare(strict_types=1);

namespace Ecolos\SyliusEanPlugin\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * Validates a UPC/EAN using a variation of the Luhn Algorithm (https://gist.github.com/damonjones/7566978)
 */
class UpcEanValidator extends ConstraintValidator
{
    /**
     * Validates a UPC/EAN number with a variation of the Luhn algorithm.
     *
     * @param mixed $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        $value = (string)$value;

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        // Must consist of 12 (UPC) or 13 (EAN) digits.
        // We use the Length constraint in the ProductVariantTypeExtension to check for it already.
        if (preg_match('/^\d{12,13}$/', $value)) {
            $lastDigitIndex = strlen($value) - 1;
            $checkDigit = (int)$value[$lastDigitIndex];

            // reverse the actual digits (excluding the check digit)
            $str = strrev(substr($value, 0, $lastDigitIndex));

            /**
             *  Moving from right to left
             *  Even digits are just added
             *  Odd digits are multiplied by three
             */
            $accumulator = 0;
            for ($i = 0; $i < $lastDigitIndex; $i++) {
                $accumulator += $i % 2 ? (int)$str[$i] : (int)$str[$i] * 3;
            }

            $checksum = (10 - ($accumulator % 10)) % 10;

            if ($checksum !== $checkDigit) {
                $this->context->addViolation($constraint->message, ['{{ value }}' => $value]);
            }
        }
    }
}
