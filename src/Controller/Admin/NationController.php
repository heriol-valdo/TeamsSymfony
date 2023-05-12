<?php

namespace App\Controller\Admin;

use App\Entity\Nation;
use App\Form\NationType;
use App\Repository\NationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\ByteString;

// créer un préfixe aux routes du contrôleur
#[Route('/admin')]
class NationController extends AbstractController
{
	public function __construct(private NationRepository $nationRepository, private RequestStack $requestStack, private EntityManagerInterface $entityManager)
	{
		
	}

	#[Route('/nation', name: 'admin.nation.index')]
	public function index():Response
	{
		return $this->render('admin/nation/index.html.twig', [
			'entities' => $this->nationRepository->findAll(),
		]);
	}

	#[Route('/nation/form/add', name: 'admin.nation.form.add')]
	#[Route('/nation/form/edit/{id}', name: 'admin.nation.form.edit')]
	public function form(int $id = null):Response
	{
		$type = NationType::class;
		
		// si l'id est nul, un joueur est en phase de création
		// si l'id n'est pas nul, un joueur est en phase de modification
		$model = $id ? $this->nationRepository->find($id) : new Nation();

		// sauvegarder le nom de l'image au cas où aucune image n'a été sélectionnée dans le formulaire
		$model->prevImage = $id ? $model->getImage() : null;
		// dd($model);

		$form = $this->createForm($type, $model);
		$form->handleRequest( $this->requestStack->getCurrentRequest() );

		if($form->isSubmitted() && $form->isValid()){
			// dd($model);
			// dd($form['portrait']->getData());

			// si une image a été sélectionnée
			if( $form['image']->getData() instanceof UploadedFile ){
				$file = $form['image']->getData(); // objet de type UploadedFile

				// générer un nom aléatoire
				$randomName = ByteString::fromRandom(32)->lower();
				$fileExtension = $file->guessClientExtension();
				$fullFileName = "$randomName.$fileExtension";

				// déplacer le fichier
				$file->move('img/', $fullFileName);

				// affecter le nom aléatoire à la propriété de l'entité
				$model->setImage( $fullFileName );
				// dd($randomName, $fileExtension, $fullFileName);

				// supprimer l'ancienne image: uniquement en phase de modification
				if($id) unlink("img/{$model->prevImage}");
			}
			// si aucune image n'a été sélectionnée : récupération de l'image stockée dans la propriété dynamique prevImage
			else {
				$model->setImage( $model->prevImage );
			}

			// accéder à la base données
			$this->entityManager->persist($model);
			$this->entityManager->flush();

			// création d'un message flash en session
			$message = $id ? 'Nation has been updated' : 'Nation has been added';
			$this->addFlash('notice', $message);

			// redirection
			return $this->redirectToRoute('admin.nation.index');
		}

		return $this->render('admin/nation/form.html.twig', [
			'form' => $form->createView(),
		]);
	}

	#[Route('/nation/remove/{id}', name: 'admin.nation.remove')]
	public function remove(int $id):Response
	{
		// sélection de l'entité à supprimer
		$entity = $this->nationRepository->find($id);

		// supprimer l'entité
		$this->entityManager->remove($entity);
		$this->entityManager->flush();

		// message flash et redirection
		$this->addFlash('notice', 'Nation has been removed');
		return $this->redirectToRoute('admin.nation.index');
	}
}