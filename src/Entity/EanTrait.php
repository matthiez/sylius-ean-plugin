<?php
declare(strict_types=1);

namespace Ecolos\SyliusEanPlugin\Entity;

use Doctrine\ORM\Mapping\Column;

trait EanTrait
{
    /**
     * @Column(type="bigint", length=13, nullable=true)
     * @var int|null
     */
    public $ean;

    public function getEan(): ?int
    {
        return null === $this->ean ? null : (int)$this->ean; // Doctrine converts bigint to string
    }

    public function setEan(?int $ean): void
    {
        $this->ean = $ean;
    }
}
