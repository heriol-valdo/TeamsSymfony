<?php

namespace App\Form;

use App\Entity\Nation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class NationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'constraints' => [
                new NotBlank([
                    'message' => ' name is required',
                ]),
                new Length([
                    'min' => 2,
                    'minMessage' => ' name is too short'
                ]),
            ],
        ])
        ->add('image', FileType::class, [
            'data_class' => null,
            // contraintes uniquement si le joueur est en cours de création
            'constraints' => $options['data']->getId() ? [] : [
                new NotBlank([
                    'message' => 'image is required',
                ])
            ],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Nation::class,
        ]);
    }
}
