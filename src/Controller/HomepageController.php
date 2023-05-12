<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
	/*
		injection de dépendances : injecter un service dans une classe symfony
			RequestStack : accéder à la requête HTTP
	*/
	public function __construct(private RequestStack $requestStack)
	{
		
	}

	#[Route('/', name: 'homepage.index')]
	public function index():Response
	{
		// $this->denyAccessUnlessGranted('ROLE_ADMIN');

		/* fonctions de débogage de symfony
			dump: 
			dd: dump die
		*/
		$request = $this->requestStack->getCurrentRequest();

		/*
			getCurrentRequest : accéder à la requête HTTP
				propriété request: $_POST
				propriété query: $_GET
				propriété server: $_SERVER
				propriété files: $_FILES
		*/
		// dd($request);
		// dd($request->headers->get('HOST'));

		// return new Response('{"data": [
		// 	{ "firstname": "name", "lastname": "lastname" }
		// ]}', 201, [
		// 	'Content-Type' => 'application/json',
		// ]);

		// array
		$array = [ 'value0', 'value1', 'value2' ];
		$arrayAssoc = [
			'key0' => 'value0',
			'key1' => 'value1',
			'key2' => 'value2',
		];
		$value = true;

		// affichage d'une vue twig
		// envoyer des données à la vue : créer un tableau associatif en second paramètre de render
		// dans la vue, c'est la clé qui stocke la donnée
		return $this->render('homepage/index.html.twig', [
			'myarray' => $array,
			'myAssocArray' => $arrayAssoc,
			'value' => $value,
			'now' => new DateTime(),
		]);		
	}

	#[Route('/hello/{name}-{age}', name: 'homepage.hello')]
	public function hello(string $name = 'Anonymous', int $age = 10):Response
	{
		return $this->render('homepage/hello.html.twig', [
			'name' => $name,
			'age' => $age,
		]);
	}
}