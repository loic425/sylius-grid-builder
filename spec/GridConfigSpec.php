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
