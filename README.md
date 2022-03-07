It's now integrated to [Sylius grid bundle 1.11 on beta release](https://github.com/Sylius/SyliusGridBundle/releases/tag/v1.11.0-BETA.1).


# Sylius Grid Builder

Build your Sylius grids in PHP.

```php
<?php

// config/sylius/grids/book.php

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Nationality;
use SyliusGridBuilder\Field;
use SyliusGridBuilder\Filter;
use SyliusGridBuilder\GridBuilder;
use SyliusGridBuilder\GridConfig;

return static function (GridConfig $grid) {
    $grid->addGrid(GridBuilder::create('app_book', Book::class)
        ->addFilter(Filter::create('title', 'string'))
        ->addFilter(Filter::create('author', 'entity')
            ->setFormOptions([
                'class' => Author::class,
                'multiple' => true,
            ])
        )
        ->addFilter(Filter::create('nationality', 'entity')
            ->setOptions([
                'fields' => ['author.nationality'],
            ])
            ->setFormOptions([
                'class' => Nationality::class,
            ])
        )
        ->addFilter(Filter::create('currencyCode', 'string')
            ->setOptions([
                'fields' => ['price.currencyCode'],
            ])
        )
        ->addFilter(Filter::create('state', 'select')
            ->setFormOptions([
                'multiple' => true,
                'choices' => [
                    'initial' => 'initial',
                    'published' => 'published',
                    'unpublished' => 'unpublished',
                ],
            ])
        )
        ->orderBy('title', 'asc')
        ->addField(Field::create('title', 'string')
            ->setLabel('Title')
            ->setSortable(true)
        )
        ->addField(Field::create('author', 'string')
            ->setLabel('Author')
            ->setPath('author.name')
            ->setSortable(true, 'author.name')
        )
        ->addField(Field::create('nationality', 'string')
            ->setLabel('Nationality')
            ->setPath('author.nationality.name')
            ->setSortable(true, 'author.nationality.name')
        )
        ->setLimits([10, 5, 15])
        ->addCreateAction()
        ->addUpdateAction()
        ->addDeleteAction()
        ->addDeleteAction([], 'bulk')
    );
};

```
[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)
  
## Installation 

Install Sylius grid builder with composer.

```bash 
  composer require loic425/sylius-grid-builder
```

Import your PHP configuration files for your grids.

```yaml
# config/services.yaml
imports:
    - { resource: "sylius/grids/**.php" }
```
    
## Documentation

Read the whole Sylius grid bundle documentation to see all the options.

[Sylius Grid Bundle documentation](https://github.com/Sylius/SyliusGridBundle)

## License

Sylius Grid Builder is completely free and released under the [MIT License](https://github.com/loic425/sylius-grid-builder/blob/master/LICENSE).

## Related

Here are some related projects.

[Sylius Grid Bundle](https://github.com/Sylius/SyliusGridBundle)
