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

interface ActionGroupInterface
{
    public static function create(string $name): self;

    public function getName(): string;

    public function addAction(ActionInterface $action): self;

    public function toArray(): array;
}
