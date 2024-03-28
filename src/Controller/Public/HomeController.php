<?php 

namespace App\Controller\Public;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\ImageRepository;
use App\Repository\StudyRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use App\Repository\LearnMoreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route ("/", name: "home")]
    public function home(TechnologyRepository $technologyRepository,LearnMoreRepository $learnRepository, StudyRepository $studyRepository, ProjectRepository $projectRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $message = new Message();

        $form=$this->CreateForm(MessageType::class,[
            'method' => 'GET',
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->persit($message);
                $entityManager->flush();

                return $this->render('home/index.html.twig',[
                    'name'=>$message->setName(),
                    'email'=>$message->setEmail(),
                    'content'=>$message->setMessage(),
                    'choice'=>$message->setSubject(),
                    $manager->persist($message),
                    $manager->flush()
                ]);
            }
        }
        return $this->render('public/index.html.twig', [
            'form' => $form,
            'technologies'=>$technologyRepository->findAll(),
            'studies' => $studyRepository->findAll(),
            'learn'=> $learnRepository->findAll(),
            'projectMain'=> $projectRepository->findBy([
                'mainProject' => true,
            ]),

        ]);
    }

    #[Route ("/projects", name: "projects")]
    public function projects(Request $request, ProjectRepository $projectRepository): Response
    {
        $countProject = $projectRepository->count([]);
        $countPerPage = 6;
        $currentPage = $request->query->getInt('page', 1);
        $countPages = ceil($countProject / $countPerPage);

        // On vérifie que la page renseignée dans l'url est valide, si ce n'est pas le cas on génère une 404.
        if ($currentPage > $countPages || $currentPage <= 0) {
            throw $this->createNotFoundException();
        }

        $projects = $projectRepository->paginate($currentPage, $countPerPage);

        return $this->render('public/allProject.html.twig', [
            'projects' => $projects,
            'countPages' => $countPages,
            'currentPage' => $currentPage,
        ]); 
    }

    #[Route ("/projects/{id}", name: 'projectPages', methods: 'GET')]
    public function projectPages(ProjectRepository $projectRepository, int $id): Response
    {
        $countProject = $projectRepository->count([]);
        $countPerPage = 6;

        $currentPage = $id;
        $countPages = ceil($countProducts / $countPerPage);

        // On vérifie que la page renseignée dans l'url est valide, si ce n'est pas le cas on génère une 404.
        if ($currentPage > $countPages || $currentPage <= 0) {
            throw $this->createNotFoundException();
        }

        $products = $productRepository->paginate($currentPage, $countPerPage);

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'countPages' => $countPages,
            'currentPage' => $currentPage,
        ]);
    }
}