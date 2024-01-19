<?php

namespace App\Controller;

use App\Entity\Recettes;
use App\Repository\RecettesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecetteController extends AbstractController
{

    /**
     * affiche les recettes
     *
     * @param RecettesRepository $repo
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/recette', name: 'app_recette', methods:(['GET']))]
    public function index(string $categorie, RecettesRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $categorie= $request->get('categorie');
        $recettes = $repo->findOneBy(["categorie" => $categorie]);
        $recettes = $paginator->paginate(
            $repo->findAll(),
            $request->query->getInt('page',1),
            10, /*limite par page*/
            ['sortDirectionParameterName' => 'dir']
        );
        return $this->render('recette/index.html.twig',[
            'recettes'=> $recettes
        ]);
    }

    
    /**
     * function update recette
     *
     * @param integer $id
     * @param Request $request
     * @param RecettesRepository $repo
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('recette/edit/{id}', name: 'edit', methods:(['GET', 'POST']))]
    public function edit(int $id,Request $request, RecettesRepository $repo, EntityManagerInterface $manager) : Response
    {
        $recette = $repo->findOneBy(["id" => $id]);
       
        return $this->render('recette/edit.html.twig');

    }

   
}
