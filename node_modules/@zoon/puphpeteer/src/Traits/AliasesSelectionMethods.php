<?php

namespace Nesk\Puphpeteer\Traits;

use Nesk\Puphpeteer\Resources\ElementHandle;

/**
 * @method null|ElementHandle querySelector(string $selector)
 * @method ElementHandle[]    querySelectorAll(string $selector)
 */
trait AliasesSelectionMethods
{
    public function querySelector(...$arguments)
    {
        return $this->__call('$', $arguments);
    }

    public function querySelectorAll(...$arguments)
    {
        return $this->__call('$$', $arguments);
    }
}
