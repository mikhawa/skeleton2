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
        $articles = $entityManager->getRepository(Articles::class)->findAll();
        return $this->render('public/index.html.twig', [
            'rubriques' => $rubriques,
            'articles' => $articles,
        ]);
    }
}
