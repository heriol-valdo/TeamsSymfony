<?php

namespace App\Controller\Admin;

use App\Entity\Player;
use App\Form\PlayerType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\ByteString;

// créer un préfixe aux routes du contrôleur
#[Route('/admin')]
class PlayerController extends AbstractController
{
	public function __construct(private PlayerRepository $playerRepository, private RequestStack $requestStack, private EntityManagerInterface $entityManager)
	{
		
	}

	#[Route('/player', name: 'admin.player.index')]
	public function index():Response
	{
		return $this->render('admin/player/index.html.twig', [
			'entities' => $this->playerRepository->findAll(),
		]);
	}

	#[Route('/player/form/add', name: 'admin.player.form.add')]
	#[Route('/player/form/edit/{id}', name: 'admin.player.form.edit')]
	public function form(int $id = null):Response
	{
		$type = PlayerType::class;
		
		// si l'id est nul, un joueur est en phase de création
		// si l'id n'est pas nul, un joueur est en phase de modification
		$model = $id ? $this->playerRepository->find($id) : new Player();

		// sauvegarder le nom de l'image au cas où aucune image n'a été sélectionnée dans le formulaire
		$model->prevImage = $id ? $model->getPortrait() : null;
		// dd($model);

		$form = $this->createForm($type, $model);
		$form->handleRequest( $this->requestStack->getCurrentRequest() );

		if($form->isSubmitted() && $form->isValid()){
			// dd($model);
			// dd($form['portrait']->getData());

			// si une image a été sélectionnée
			if( $form['portrait']->getData() instanceof UploadedFile ){
				$file = $form['portrait']->getData(); // objet de type UploadedFile

				// générer un nom aléatoire
				$randomName = ByteString::fromRandom(32)->lower();
				$fileExtension = $file->guessClientExtension();
				$fullFileName = "$randomName.$fileExtension";

				// déplacer le fichier
				$file->move('img/', $fullFileName);

				// affecter le nom aléatoire à la propriété de l'entité
				$model->setPortrait( $fullFileName );
				// dd($randomName, $fileExtension, $fullFileName);

				// supprimer l'ancienne image: uniquement en phase de modification
				if($id) unlink("img/{$model->prevImage}");
			}
			// si aucune image n'a été sélectionnée : récupération de l'image stockée dans la propriété dynamique prevImage
			else {
				$model->setPortrait( $model->prevImage );
			}

			// accéder à la base données
			$this->entityManager->persist($model);
			$this->entityManager->flush();

			// création d'un message flash en session
			$message = $id ? 'Player has been updated' : 'Player has been added';
			$this->addFlash('notice', $message);

			// redirection
			return $this->redirectToRoute('admin.player.index');
		}

		return $this->render('admin/player/form.html.twig', [
			'form' => $form->createView(),
		]);
	}

	#[Route('/player/remove/{id}', name: 'admin.player.remove')]
	public function remove(int $id):Response
	{
		// sélection de l'entité à supprimer
		$entity = $this->playerRepository->find($id);

		// supprimer l'entité
		$this->entityManager->remove($entity);
		$this->entityManager->flush();

		// message flash et redirection
		$this->addFlash('notice', 'Player has been removed');
		return $this->redirectToRoute('admin.player.index');
	}
}