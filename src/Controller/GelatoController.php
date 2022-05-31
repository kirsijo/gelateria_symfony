<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class GelatoController extends AbstractController
{
    #[Route('/', name: 'app_gelato')]
    public function homepage(): Response
    {
        return $this->render('gelato/homepage.html.twig');
    }

    #[Route('/flavours/{slug}')]
    public function flavour(string $slug = null): Response
    {

        $flavours = [
            'pistachio' => ['flavour' => 'pistachio', 'image'=>'https://www.davidlebovitz.com/wp-content/uploads/2007/09/1314787147_c9ac9d5bae_o-1.jpg', 'description' => 'Pistachio ice cream or pistachio nut ice cream is an ice cream flavor made with pistachio nuts.' ],
            'blackcurrant' => ['flavour' => 'blackcurrant', 'image' => 'https://5.imimg.com/data5/SELLER/Default/2021/2/UZ/FD/XU/110446045/black-currant-ice-cream-500x500.jpeg', 'description' => 'sweet and tart'],
        ];

        if ($slug) {
            $flavour = 'Flavour: '.u(str_replace('-', ' ', $slug))->title(true);
            return $this->render('gelato/singleflavour.html.twig', ['flavour' => $flavours[$slug]]);
        } else {
            $flavour = 'All flavours';
        }
        return $this->render('gelato/flavours.html.twig', ['flavours' => $flavours]);
    }

    #[Route('/visitus')]
    public function visitus(): Response {

        $address = ['street' => '147 Lordship Ln', 'city' => 'London','postcode' => 'SE22 8HX'];

        return $this->render('gelato/visitus.html.twig', ['address' => $address]);
    }
}


