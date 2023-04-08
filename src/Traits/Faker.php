<?php

declare(strict_types=1);

namespace Taboritis\Wrapper\Traits;

use Faker\Factory;
use Faker\Generator;

trait Faker
{
    protected Generator $faker;

    public function bootFaker(): void
    {
        $this->faker = Factory::create();
    }
}
