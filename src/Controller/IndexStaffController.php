<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexStaffController extends AbstractController
{
    #[Route('/index/staff', name: 'app_index_staff')]
    public function index(): Response
    {
        return $this->render('staff/index.html.twig');
    }
}
