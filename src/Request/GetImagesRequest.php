<?php

declare(strict_types=1);

namespace App\Request;

use App\Model\Url;
use Jrm\RequestBundle\Attribute\Body;

final class GetImagesRequest
{
    public function __construct(
        #[Body('url')]
        private readonly string $url,
    ) {
    }

    public function url(): Url
    {
        return new Url($this->url);
    }
}