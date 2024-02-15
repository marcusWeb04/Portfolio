<?php
// src/Form/ContactType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

final class MessageType extends AbstractType
{
    public function buildForm (FormBuilderInterface $builder, array $options): void

    {
        $builder
            ->add('name', TextType::class,[
                'label'=> false,
                'attr' => ['placeholder' => 'Nom...'],
                'required' => true,
            ])

            ->add('email', EmailType::class,[
                'label'=> false,
                'attr' => ['placeholder' => 'Email...'],
                'required' => true,
            ])

            ->add('content', TextAreaType::class,[
                'label'=> false,
                'attr' => ['placeholder' => 'Détailler votre demande'],
                'required' => true,
            ])

            ->add('choice', ChoiceType::class, [
                'label' => 'En quoi puis-je vous aider?',
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Emploie' => '1',
                    'Stage' => '2',
                    'Question' => '3',
                    'Projet' => '4',
                ],
            ])

            ->add('button', SubmitType::class,[
                'label' => 'Envoyer'
            ])
        ;
    }
}