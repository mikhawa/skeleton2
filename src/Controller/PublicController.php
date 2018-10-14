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
    /**
     * @Route("/idarticle/{id}", name="detail_article")
     */
    public function article($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $rubriques = $entityManager->getRepository(Rubriques::class)->findAll();
        $articles = $entityManager->getRepository(Articles::class)->find($id);
        return $this->render('public/article.html.twig', [
            'rubriques' => $rubriques,
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/idcateg/{id}", name="detail_rubrique")
     */
    public function rubrique($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $rubriques = $entityManager->getRepository(Rubriques::class)->findAll();
        $rubriqueActu = $entityManager->getRepository(Rubriques::class)->find($id);
        $articles = $rubriqueActu->getArticlesarticles();
        return $this->render('public/rubrique.html.twig', [
            'rubriques' => $rubriques,
            'rubriqueactu' => $rubriqueActu,
            'articles' => $articles,
        ]);
    }
}
