<?php

declare(strict_types=1);

namespace Tests\Taboritis\Wrapper;

use PHPUnit\Framework\Attributes\Test;
use Taboritis\Wrapper\WrapperFactory;

/**
 * @covers \Taboritis\Wrapper\WrapperFactory
 */
class WrapperFactoryTest extends TestCase
{
    #[Test]
    public function it_creates_a_object(): void
    {
        $factory = new class extends WrapperFactory {
        };
        $result = $factory->create();

        $this->assertIsObject($result);
    }
}
