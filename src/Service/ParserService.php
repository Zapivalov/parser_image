<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\Image;
use App\Factory\ImageFactory;
use App\Model\Url;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ParserService
{
    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly ImageFactory $factory,
    ) {
    }

    public function parseImagesByUrl(Url $url): array
    {
        $response = $this->client->request(
            Request::METHOD_GET,
            $url->value,
        );

        $crawler = new Crawler($response->getContent());
        $images = $crawler
            ->filter('img')
            ->each(function (Crawler $node) use ($url): ?Image {
                if (empty($node->attr('src'))) {
                    return null;
                }

                return $this->factory->create($url, $node->attr('src'));
            });

        return array_filter($images);
    }
}