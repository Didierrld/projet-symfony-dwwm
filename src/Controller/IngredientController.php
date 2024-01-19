<?php

namespace App\Controller;

use App\Entity\Ingredients;
use App\Form\IngredientType;
use App\Repository\IngredientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends AbstractController
{
    /**
     * fonction pour afficher les ingrédients
     *
     * @param IngredientsRepository $repo
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/ingredient', name: 'app_ingredient',  methods:(['GET']))]
    public function index(IngredientsRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $ingredients = $repo->findAll();
        $ingredients = $paginator->paginate(
            $repo->findAll(),
            $request->query->getInt('page',1),
            10, /*limite par page*/
            ['sortDirectionParameterName' => 'dir']
        );
        return $this->render('ingredient/index.html.twig',[
            'ingredients'=> $ingredients
        ]);
    }

  

    /**
     * function update ingredient
     *
     * @param integer $id
     * @param Request $request
     * @param IngredientsRepository $repo
     * @param EntityManagerInterface $manager
     * @return Response
     */
    #[Route('ingredient/vue/{id}', name: 'vue', methods:(['GET', 'POST']))]
    public function edit(int $id,Request $request, IngredientsRepository $repo, EntityManagerInterface $manager) : Response
    {
        $ingredient = $repo->findOneBy(["id" => $id]);
       
        return $this->render('ingredient/edit.html.twig',[
            'ingredients'=> $ingredient
        ]);

    }

}
