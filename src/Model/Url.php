<?php

declare(strict_types=1);

namespace App\Model;

use RuntimeException;

final class Url
{
    public function __construct(
        public readonly string $value,
    ) {
        if (false === filter_var($value, FILTER_VALIDATE_URL)) {
            throw new RuntimeException('URL невалидный');
        }
    }
}