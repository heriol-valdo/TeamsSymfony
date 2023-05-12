<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// créer un préfixe aux routes du contrôleur
#[Route('/admin')]
class HomepageController extends AbstractController
{
	#[Route('/', name: 'admin.homepage.index')]
	public function index():Response
	{
		return $this->render('admin/homepage/index.html.twig', [
			
		]);
	}
}