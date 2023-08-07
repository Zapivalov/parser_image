<?php

declare(strict_types=1);

namespace App\Factory;

use App\Dto\Image;
use App\Model\Url;

final class ImageFactory
{
    public function create(Url $url, string $src): Image
    {
        $src = trim($src, '/');
        $arSrc = parse_url($src);
        $arUrl = parse_url($url->value);

        if (empty($arSrc['host'])) {
            $src = sprintf('%s/%s', $arUrl['host'], $src);
        }

        if (empty($arSrc['scheme'])) {
            $src = sprintf('%s://%s', $arUrl['scheme'], $src);
        }

        return new Image(
            $src,
            mb_strlen(base64_decode($src), '8bit'),
        );
    }
}