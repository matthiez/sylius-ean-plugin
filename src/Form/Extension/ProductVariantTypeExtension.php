<?php
declare(strict_types=1);

namespace Ecolos\SyliusEanPlugin\Form\Extension;

use Ecolos\SyliusEanPlugin\Validator\Constraints\UpcEan;
use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;

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
                "constraints" => [
                    new Length([
                        "min" => 12,
                        "max" => 13,
                        "groups" => ["ecolos_sylius_ean_plugin_product_variant", "sylius"],
                    ]),
                    new UpcEan([
                        "message" => "ecolos_sylius_ean_plugin.ui.invalid_ean",
                        "groups" => ["ecolos_sylius_ean_plugin_product_variant", "sylius"],
                    ])
                ],
                "validation_groups" => ["ecolos_sylius_ean_plugin_product_variant"],
                'html5' => true
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
