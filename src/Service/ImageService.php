<?php

declare(strict_types=1);

namespace App\Service;

use App\Converter\SizeConverter;
use App\Dto\ParseResult;
use App\Model\Url;

final class ImageService
{
    public function __construct(
        private readonly ParserService $parserService,
        private readonly SizeConverter $sizeConverter,
    ) {
    }

    public function getImagesByUrl(Url $url): ParseResult
    {
        $images = $this->parserService->parseImagesByUrl($url);
        $count = count($images);
        $totalSize = 0;

        foreach ($images as $image) {
            $totalSize += $image->size;
        }

        $totalSize = $this->sizeConverter->convertFromBytesByMb($totalSize);

        return new ParseResult(
            $images,
            $count,
            $totalSize,
        );
    }
}