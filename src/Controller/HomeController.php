<?php 

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\ImageRepository;
use App\Repository\StudyRepository;
use App\Repository\ProjectRepository;
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
    public function home(LearnMoreRepository $learnRepository, ProjectRepository $projectRepository, Request $request, EntityManagerInterface $entityManager): Response
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
                    $manager->persist($message),
                    $manager->flush()
                ]);
            }
        }
        return $this->render('home/index.html.twig', [
            'form' => $form,
            'learn'=> $learnRepository->findAll(),
            'projectMain'=> $projectRepository->findBy([
                'mainProject' => true,
            ]),
        ]);
    }
}