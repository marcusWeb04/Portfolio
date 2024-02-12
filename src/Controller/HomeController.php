<?php 

namespace App\Controller;

use App\Repository\ImageRepository;
use App\Repository\StudyRepository;
use App\Repository\ProjectRepository;
use App\Repository\LearnMoreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route ("/", name: "home")]
    public function home(StudyRepository $studyRepository, ProjectRepository $projectRepository, ImageRepository $imageRepository): Response
    {
        return $this->render('home/index.html.twig',[

            'studies'=> $studyRepository->findAll([]),
            'images'=>$imageRepository->find([]),
            'projects'=> $projectRepository->findBy([
                'mainProject' => true,
            ])
        ]);
    }
}