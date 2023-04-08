<?php

declare(strict_types=1);

namespace Taboritis\Wrapper\Traits;

use Illuminate\Support\Str;

trait BootableTraits
{
    public function fireTraits(): void
    {
        $traits = $this->getTraits();

        foreach ($traits as $trait) {
            $className = array_reverse(explode('\\', $trait))[0];
            $expectedBootMethodName = $this->getExpectedMethodName($className);

            if (method_exists($this, $expectedBootMethodName)) {
                $this->$expectedBootMethodName();
            }
        }
    }

    private function getTraits()
    {
        $class = $this;
        if (is_object($class)) {
            $class = get_class($class);
        }

        $results = [];

        foreach (array_reverse(class_parents($class)) + [$class => $class] as $class) {
            $results += $this->traitUsesRecursive($class);
        }

        return array_unique($results);
    }

    public function traitUsesRecursive(mixed $trait)
    {
        $traits = class_uses($trait) ?: [];

        foreach ($traits as $trait) {
            $traits += $this->traitUsesRecursive($trait);
        }

        return $traits;
    }

    private function getExpectedMethodName(string $className): string
    {
        return "boot{$className}";
    }
}
