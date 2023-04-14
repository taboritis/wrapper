<?php

declare(strict_types=1);

namespace Tests\Taboritis\Wrapper\Examples;

use Examples\Taboritis\Wrapper\Wrappers\Author;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\Wrapper\Traits\Faker;
use Tests\Taboritis\Wrapper\TestCase;

/**
 * @covers \Examples\Taboritis\Wrapper\Wrappers\Author
 */
class AuthorTest extends TestCase
{
    use Faker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->author = new Author();
    }

    #[Test]
    public function it_has_a_name(): void
    {
        $this->author->name = $this->faker->name();
        $this->assertNotNull($this->author->name);
    }

    #[Test]
    public function it_does_not_have_a_price(): void
    {
        $this->author->price = $this->faker->numberBetween(100, 200);
        $this->assertNull($this->author->price);
    }
}
