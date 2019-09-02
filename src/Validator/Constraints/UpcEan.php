<?php
declare(strict_types=1);

namespace Ecolos\SyliusEanPlugin\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class UpcEan extends Constraint
{
    public $message = '{{ value }} is not a valid UPC/EAN.';
}
