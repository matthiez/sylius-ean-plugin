<?php
declare(strict_types=1);

namespace Ecolos\SyliusEanPlugin\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductVariantTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ean', NumberType::class, [
                'label' => 'EAN',
                'required' => false,
            ]);
    }

    /**
     * @inheritdoc
     */
    static public function getExtendedTypes(): iterable
    {
        return [ProductVariantType::class];
    }
}
