<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Rubriques;
use App\Entity\Articles;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $rubriques = $entityManager->getRepository(Rubriques::class)->findAll();
        // findBy([],['id'=>ASC]) for ordering the result
        $articles = $entityManager->getRepository(Articles::class)->findBy([],['thedate'=>"DESC"]);
        return $this->render('public/index.html.twig', [
            'rubriques' => $rubriques,
            'articles' => $articles,
        ]);
    }
}
