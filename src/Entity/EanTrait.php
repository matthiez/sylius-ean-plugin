<?php
declare(strict_types=1);

namespace Ecolos\SyliusEanPlugin\Entity;

use Doctrine\ORM\Mapping\Column;

trait EanTrait
{
    /**
     * @Column(type="string", nullable=true)
     * @var bool|null
     */
    public $ean;

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(?string $ean): void
    {
        $this->ean = $ean;
    }
}
