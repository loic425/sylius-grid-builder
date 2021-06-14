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

interface ActionInterface
{
    public static function create(string $name, string $type): self;

    public function getName(): string;

    public function setLabel(string $label): self;

    public function setEnabled(bool $enabled): self;

    public function setIcon(string $icon): self;

    public function setOptions(array $options): self;

    public function setPosition(int $position): self;

    public function toArray(): array;
}
