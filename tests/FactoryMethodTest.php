<?php

declare(strict_types=1);

namespace Tests\Taboritis\Wrapper;

use PHPUnit\Framework\Attributes\Test;
use ReflectionClass;
use Taboritis\Wrapper\Traits\Faker;
use Taboritis\Wrapper\Wrapper;

/**
 * @covers \Taboritis\Wrapper\Wrapper::create
 */
class FactoryMethodTest extends TestCase
{
    use Faker;

    #[Test]
    public function it_can_be_created_by_create_method(): void
    {
        $wrapper = new class extends Wrapper {
        };

        $this->assertInstanceOf(Wrapper::class, $wrapper::create());
    }

    #[Test]
    public function a_wrapper_class_is_abstract(): void
    {
        $reflection = new ReflectionClass(Wrapper::class);

        $this->assertTrue($reflection->isAbstract());
    }

    #[Test]
    public function a_wrapper_can_set_attribute(): void
    {
        $class = new class extends Wrapper {
        };
        $class->title = $title = $this->faker->sentence();

        $this->assertEquals($class->title, $title);
    }
}
