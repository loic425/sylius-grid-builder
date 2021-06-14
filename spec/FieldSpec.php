<?php

/*
 * This file is part of the Grid builder package.
 *
 * (c) Loïc Frémont
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\SyliusGridBuilder;

use PhpSpec\ObjectBehavior;
use SyliusGridBuilder\Field;

class FieldSpec extends ObjectBehavior
{
    function let(): void
    {
        $this->beConstructedWith('name', 'string');
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(Field::class);
    }

    function it_sets_path(): void
    {
        $field = $this->setPath('custom_path');

        $field->toArray()['path']->shouldReturn('custom_path');
    }

    function it_sets_label(): void
    {
        $field = $this->setLabel('Name');

        $field->toArray()['label']->shouldReturn('Name');
    }

    function it_enables_fields(): void
    {
        $field = $this->setEnabled(true);

        $field->toArray()['enabled']->shouldReturn(true);
    }

    function it_disables_fields(): void
    {
        $field = $this->setEnabled(false);

        $field->toArray()['enabled']->shouldReturn(false);
    }

    function it_makes_fields_sortable(): void
    {
        $field = $this->setSortable(true);

        $field->toArray()['sortable']->shouldReturn(true);
    }

    function it_makes_fields_sortable_with_path(): void
    {
        $field = $this->setSortable(true, 'path');

        $field->toArray()['sortable']->shouldReturn('path');
    }

    function it_makes_fields_not_sortable(): void
    {
        $field = $this->setSortable(false);

        $field->toArray()->shouldNotHaveKey('sortable');
    }

    function it_sets_position(): void
    {
        $field = $this->setPosition(42);

        $field->toArray()['position']->shouldReturn(42);
    }

    function it_sets_options(): void
    {
        $field = $this->setOptions(['template' => '/path/to/template']);

        $field->toArray()['options']->shouldReturn(['template' => '/path/to/template']);
    }
}
