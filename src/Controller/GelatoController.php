<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class GelatoController extends AbstractController
{
    #[Route('/', name: 'app_gelato')]
    public function homepage(): Response
    {
        return new Response('Gelateria');
    }

    #[Route('/flavours/{slug}')]
    public function flavour(string $slug = null): Response
    {
        if ($slug) {
            $flavour = 'Flavour: '.u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $flavour = 'All flavours';
        }
        return new Response($flavour);
    }
}
