<?php 

namespace App\Controller;

use App\Repository\StudyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    #[Route ("/", name: "home")]
    public function home(StudyRepository $studyRepository): Response
    {
        return $this->render('home/index.html.twig',[
            'studies'=> $studyRepository->findAll([]),
        ]);
    }
}