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

interface FieldInterface
{
    public static function create(string $name, string $type): self;

    public function getName(): string;

    public function setPath(string $path): self;

    public function setLabel(string $label): self;

    public function setEnabled(bool $enabled): self;

    public function setSortable(bool $sortable, string $path = null): self;

    public function setPosition(int $position): self;

    public function setOptions(array $options): self;

    public function toArray(): array;
}
