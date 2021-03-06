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

namespace SyliusGridBuilder;

use Symfony\Component\Config\Builder\ConfigBuilderInterface;

if (interface_exists(ConfigBuilderInterface::class)) {
    interface GridConfigInterface extends ConfigBuilderInterface
    {
        public function addGrid(GridBuilderInterface $gridBuilder): self;
    }
} else {
    interface GridConfigInterface
    {
        public function addGrid(GridBuilderInterface $gridBuilder): self;

        /**
         * Gets all configuration represented as an array.
         */
        public function toArray(): array;

        /**
         * Gets the alias for the extension which config we are building.
         */
        public function getExtensionAlias(): string;
    }
}
