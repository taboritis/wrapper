<?php

declare(strict_types=1);

namespace Examples\Taboritis\Wrapper\Factories;

use Examples\Taboritis\Wrapper\Wrappers\Post;

class PostFactory
{
    public function create(array $data = []): Post
    {
        $post = new Post();

        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($post, $methodName)) {
                if ($key === 'statusCode') {
                    $value = (int)$value;
                }
                $post->{$methodName}($value);
            }
        }

        return $post;
    }
}
