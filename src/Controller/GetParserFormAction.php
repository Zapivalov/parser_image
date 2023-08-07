<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    '/',
    name: 'app.parser_image',
    methods: [Request::METHOD_GET],
)]
final class GetParserFormAction extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('index.html.twig');
    }
}