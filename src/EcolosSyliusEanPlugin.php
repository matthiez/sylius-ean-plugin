<?php
declare(strict_types=1);

namespace Ecolos\SyliusEanPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class EcolosSyliusEanPlugin extends Bundle
{
    use SyliusPluginTrait;
}
