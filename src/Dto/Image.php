<?php

declare(strict_types=1);

namespace App\Dto;

final class Image
{
    public function __construct(
        public readonly string $link,
        public readonly int $size,
    ) {
    }

}