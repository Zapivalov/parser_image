<?php

declare(strict_types=1);

namespace App\Converter;

final class SizeConverter
{
    const ONE_MB_IN_BYTES = 1024 * 1024;

    public function convertFromBytesByMb(float $bytes): float
    {
        return ceil($bytes / self::ONE_MB_IN_BYTES * 1000) / 1000;
    }
}