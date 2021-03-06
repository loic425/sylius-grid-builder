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

interface GridBuilderInterface
{
    public static function create(string $name, string $resourceClass): self;

    public function getName(): string;

    public function setDriver(string $driver): self;

    /**
     * @param string|array $method
     */
    public function setRepositoryMethod($method, array $arguments = []): self;

    public function addField(FieldInterface $field): self;

    public function removeField(string $name): self;

    public function orderBy(string $name, string $direction): self;

    public function addOrderBy(string $name, string $direction = 'asc'): self;

    public function setLimits(array $limits): self;

    public function addFilter(FilterInterface $filter): self;

    public function removeFilter(string $name): self;

    public function addActionGroup(string $name): self;

    public function addAction(ActionInterface $action, string $group): self;

    public function addMainAction(ActionInterface $action): self;

    public function addItemAction(ActionInterface $action): self;

    public function addBulkAction(ActionInterface $action): self;

    public function addCreateAction(array $options = [], string $group = 'main'): self;

    public function addUpdateAction(array $options = [], string $group = 'item'): self;

    public function addDeleteAction(array $options = [], string $group = 'item'): self;

    public function toArray(): array;
}
