<?php

namespace App\Controller;

use App\Repository\NationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NationController extends AbstractController
{
	public function __construct(private NationRepository $playerRepository)
	{
		
	}

	#[Route('/nations', name: 'nation.index')]
	public function index():Response
	{
		$entities = $this->playerRepository->findAll();
		// dump($entities);
		return $this->render('nation/index.html.twig', [
			'entities' => $entities,
		]);
	}

	#[Route('/nation/{name}-{id}', name: 'nation.details')]
	public function details(string $name, int $id):Response
	{
		// $entity = $this->playerRepository->find($id);
		$entity = $this->playerRepository->findOneBy([
			'name' => $name,
			'id' => $id,
		]);
		// dump($entity);
		return $this->render('nation/details.html.twig', [
			'entity' => $entity,
		]);
	}
}