<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{
	public function __construct(private PlayerRepository $playerRepository)
	{
		
	}

	#[Route('/players', name: 'player.index')]
	public function index():Response
	{
		$entities = $this->playerRepository->findAll();
		// dump($entities);
		return $this->render('player/index.html.twig', [
			'entities' => $entities,
		]);
	}

	#[Route('/player/{firstname}-{lastname}-{id}', name: 'player.details')]
	public function details(string $firstname, string $lastname, int $id):Response
	{
		// $entity = $this->playerRepository->find($id);
		$entity = $this->playerRepository->findOneBy([
			'firstname' => $firstname,
			'lastname' => $lastname,
			'id' => $id,
		]);
		// dump($entity);
		return $this->render('player/details.html.twig', [
			'entity' => $entity,
		]);
	}
}