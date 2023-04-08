<?php

declare(strict_types=1);

namespace Tests\Taboritis\Wrapper;

use ReflectionClass;
use Taboritis\Wrapper\Traits\BootableTraits;

/**
 * @covers \Tests\Taboritis\Wrapper\TestCase::setUp()
 */
class BootableTraitsTest extends TestCase
{
    /** @test */
    public function it_uses_bootable_traits(): void
    {
        $reflection = new ReflectionClass(TestCase::class);

        $this->assertContains(BootableTraits::class, $reflection->getTraitNames());
    }

    /** @test */
    public function it_has_not_faker_attribute(): void
    {
        $reflection = new ReflectionClass($this);
        $this->assertFalse($reflection->hasProperty('faker'));
    }
}
