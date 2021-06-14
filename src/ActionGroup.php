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

final class ActionGroup implements ActionGroupInterface
{
    private string $name;
    private array $actions = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function create(string $name): ActionGroupInterface
    {
        return new self($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addAction(ActionInterface $action): ActionGroupInterface
    {
        $this->actions[$action->getName()] = $action;

        return $this;
    }

    public function toArray(): array
    {
        $output = [];

        if (count($this->actions) > 0) {
            $output = array_map(function (ActionInterface $action) { return $action->toArray(); }, $this->actions);
        }

        return $output;
    }
}
