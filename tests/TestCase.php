<?php

declare(strict_types=1);

namespace Tests\Taboritis\Wrapper;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Taboritis\Wrapper\Traits\BootableTraits;

abstract class TestCase extends BaseTestCase
{
    use BootableTraits;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fireTraits();
    }
}
