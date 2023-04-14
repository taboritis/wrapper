<?php

declare(strict_types=1);

namespace Tests\Taboritis\Wrapper\Examples;

use Examples\Taboritis\Wrapper\Factories\AuthorFactory;
use Examples\Taboritis\Wrapper\Wrappers\Author;
use PHPUnit\Framework\Attributes\Test;
use Tests\Taboritis\Wrapper\TestCase;

/** @covers \Examples\Taboritis\Wrapper\Factories\AuthorFactory */
class AuthorFactoryTest extends TestCase
{
    private AuthorFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new AuthorFactory();
    }

    #[Test]
    public function it_creates_an_author(): void
    {
        $factory = new AuthorFactory();

        $this->assertInstanceOf(Author::class, $factory->create());
    }

    #[Test]
    public function it_can_generate_an_author(): void
    {
        $this->assertInstanceOf(Author::class, $this->factory->generate());
    }
}
