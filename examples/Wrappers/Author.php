<?php

declare(strict_types=1);

namespace Examples\Taboritis\Wrapper\Wrappers;

class Author
{
    private string $name;

    public function __set(string $property, mixed $value)
    {
        if (property_exists($this, $property)) {
            $this->{$property} = $value;
        }
    }

    public function __get(string $property)
    {
        return $this->{$property} ?? null;
    }
}