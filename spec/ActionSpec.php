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
use SyliusGridBuilder\Action;

class ActionSpec extends ObjectBehavior
{
    function let(): void
    {
        $this->beConstructedWith('create', 'create');
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(Action::class);
    }

    function it_sets_label(): void
    {
        $action = $this->setLabel('Create');

        $action->toArray()['label']->shouldReturn('Create');
    }

    function it_enables_actions(): void
    {
        $action = $this->setEnabled(true);

        $action->toArray()['enabled']->shouldReturn(true);
    }

    function it_disables_actions(): void
    {
        $action = $this->setEnabled(false);

        $action->toArray()['enabled']->shouldReturn(false);
    }

    function it_sets_icon(): void
    {
        $action = $this->setIcon('cogs');

        $action->toArray()['icon']->shouldReturn('cogs');
    }

    function it_sets_options(): void
    {
        $action = $this->setOptions(['custom' => true]);

        $action->toArray()['options']->shouldReturn(['custom' => true]);
    }

    function it_sets_position(): void
    {
        $action = $this->setPosition(42);

        $action->toArray()['position']->shouldReturn(42);
    }
}
