<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Toroka',  'artist' => 'Christian Kuria'],
            ['song' => 'Sucky Place', 'artist' => 'Samuel Sichangi & Karun'],
            ['song' => 'Hamna Aibu', 'artist' => 'Ukweli & Kashat'],
            ['song' => 'Sweet Matunda', 'artist' => 'Ethan Mziki & Watendawili'],
            ['song' => 'Haiku', 'artist' =>'Revamp & Wendykay'],
        ];


        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'The Slaylist',
            'tracks' =>  $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        return $this->render('vinyl/browse.html.twig',[
          'genre' => $genre,
        ]);
    }
}