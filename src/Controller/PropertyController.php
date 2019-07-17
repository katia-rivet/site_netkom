<?php


namespace App\Controller;


use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PropertyController
 * @package App\Controller
 * @Route("/occasions")
 */
class PropertyController extends AbstractController
{
    private $repository;
    private $em;

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/", name="property_index")
     */
    public function index(): Response
    {

        return $this->render('pages/property/index.html.twig',[
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/{id}/{slug}", name="property_show")
     * @return Response
     */
    public function show(int $id , string $slug): Response
    {
        $property = $this->repository->find($id);
        return $this->render('pages/property/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }
}