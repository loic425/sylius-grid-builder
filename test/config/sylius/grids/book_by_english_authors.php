<?php

use App\Entity\Book;
use App\Entity\Nationality;
use SyliusGridBuilder\Field;
use SyliusGridBuilder\Filter;
use SyliusGridBuilder\GridBuilder;
use SyliusGridBuilder\GridConfig;

return static function (GridConfig $grid) {
    $grid->addGrid(GridBuilder::create('app_book_by_english_authors', Book::class)
        ->setRepositoryMethod(["expr:service('app.english_books_query_builder')", 'create'])
        ->addFilter(Filter::create('title', 'string'))
        ->addFilter(Filter::create('author', 'entity')
            ->setFormOptions([
                'class' => Nationality::class,
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
            ->setPath('na.name')
            ->setSortable(true, 'na.name')
        )
        ->setLimits([10, 5, 15])
    );
};
