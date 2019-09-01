#INSTALLATION:

1. Add Github repository to composer.json:
```Add repository from Github
            {
                "repositories": [
                    {
                        "type": "vcs",
                        "url":  "git@bitbucket.org:ecolos/sylius-ean-plugin.git"
                    }
                ]
            }
```

2. Install package via composer from Bitbucket 
```console
composer require ecolos/sylius-ean-plugin
```

3. Add to config/bundles.php
```php
        [
            Ecolos\SyliusEanPlugin\EcolosSyliusEanPlugin::class => ['all' => true],
        ]
```

4. Clear the symfony cache
```shell script
php bin/console cache:clear
```

5.  Determine doctrine schema changes and migrate
```shell script
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:execute --up XXXXXXXXXXXXX
```

6. Add to config/services.yaml
```yaml
imports:
  - { resource: "@EcolosSyliusEanPlugin/Resources/config/config.yml" }
```

7. Edit src/Entity/ProductVariant.php
```php
<?php
use Ecolos\SyliusEanPlugin\Entity\EanTrait;
class ProductVariant { use EanTrait; }
``` 

8. Add form_row to SyliusAdminBundle/ProductVariant/Tab/_details.html.twig
```twig
{{ form_row(form.ean) }}
``` 

#USAGE:
Check out the product variant form in the admin section.
An EAN input should be rendered.

#TODO:
- Add tests
