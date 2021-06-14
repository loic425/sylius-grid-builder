<?php

namespace spec\SyliusGridBuilder;

use PhpSpec\ObjectBehavior;
use SyliusGridBuilder\GridBuilderInterface;
use SyliusGridBuilder\GridConfig;

class GridConfigSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(GridConfig::class);
    }

    function it_adds_grids(GridBuilderInterface $gridBuilder): void
    {
        $gridBuilder->getName()->willReturn('my_grid');
        $gridBuilder->toArray()->willReturn(['my_grid' => []]);

        $this->addGrid($gridBuilder);
        $this->toArray()['grids']->shouldHaveKey('my_grid');
    }
}
