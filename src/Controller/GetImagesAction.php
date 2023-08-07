<?php

declare(strict_types=1);

namespace App\Controller;

use App\Request\GetImagesRequest;
use App\Service\ImageService;
use Jrm\RequestBundle\MapRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    '/parser',
    name: 'app.get_parser_image',
    methods: [Request::METHOD_POST],
)]
final class GetImagesAction extends AbstractController
{
    public function __construct(
        private readonly ImageService $imageService,
    ) {
    }

    public function __invoke(#[MapRequest] GetImagesRequest $request): Response
    {
        $result = $this->imageService->getImagesByUrl($request->url());

        return $this->render('image_list.html.twig',[
            'images' => $result->images,
            'count' => $result->count,
            'total_size' => $result->totalSize,
        ]);
    }
}