<?php

declare(strict_types=1);

namespace App\Dto;

final class ParseResult
{
    public function __construct(
        public readonly array $images,
        public readonly int $count,
        public readonly float $totalSize,
    ) {
    }
}