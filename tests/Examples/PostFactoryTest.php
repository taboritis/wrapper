<?php

declare(strict_types=1);

namespace Tests\Taboritis\Wrapper\Examples;

use Examples\Taboritis\Wrapper\Factories\PostFactory;
use Examples\Taboritis\Wrapper\Wrappers\Post;
use PHPUnit\Framework\Attributes\Test;
use ReflectionClass;
use Taboritis\Wrapper\Traits\Faker;
use Tests\Taboritis\Wrapper\TestCase;

/** @covers \Examples\Taboritis\Wrapper\Factories\PostFactory */
class PostFactoryTest extends TestCase
{
    use Faker;

    private PostFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new PostFactory();
    }

    #[Test]
    public function it_creates_a_post(): void
    {
        $factory = new PostFactory();

        $this->assertInstanceOf(Post::class, $factory->create());
    }

    #[Test]
    public function basis_cases_tests(): void
    {
        $factory = new PostFactory();
        $rawData = [
            'id' => $this->faker->uuid(),
            'title' => $this->faker->sentence(),
        ];
        $post = $factory->create($rawData);

        $this->assertEquals($rawData['id'], $post->getId());
        $this->assertEquals($rawData['title'], $post->getTitle());
    }

    #[Test]
    public function it_does_not_create_non_existent_properties(): void
    {
        $id = $this->faker->uuid();
        $factory = new PostFactory();
        $post = $factory->create(['nonExistent' => $id]);

        $reflection = new ReflectionClass($post);
        $test = $reflection->hasProperty('nonExistent');

        $this->assertFalse($test);
    }

    #[Test]
    public function it_can_convert_string_to_integer(): void
    {
        $post = $this->factory->create(['statusCode' => '11']);

        $this->assertIsInt($post->getStatusCode());
    }
}
