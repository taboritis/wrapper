<?php

declare(strict_types=1);

namespace Taboritis\Wrapper;

abstract class Wrapper
{
    public static function create(): self
    {
        return new static();
    }
}
