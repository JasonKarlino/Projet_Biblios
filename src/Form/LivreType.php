<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Livre;
use App\Enum\LivreStatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => [
                    'placeholder' => 'Entrez le titre du livre',
                ],
            ])
            ->add('image', TextType::class, [
                'attr' => [
                    'placeholder' => 'Entrez l\'URL de l\'image du livre',
                ],
            ])
            ->add('numeroISBN', TextType::class, [
                'attr' => [
                    'placeholder' => 'Entrez le numéro ISBN du livre',
                ],
            ])
            ->add('date_sortie', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Sélectionnez la date de sortie du livre',
                ],
            ])
            ->add('nombre_pages', NumberType::class, [
                'attr' => [
                    'placeholder' => 'Entrez le nombre de pages du livre',
                ],
            ])
            ->add('synopsis', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Entrez le synopsis du livre',
                ],
            ])
            ->add('statut', EnumType::class, [
                'class' => LivreStatus::class,
                'choice_label' => fn(LivreStatus $choice) => $choice->getLabel(),
                'attr' => [
                    'placeholder' => 'Sélectionnez un statut',
                ],
            ])
            ->add('editeur', EntityType::class, [
                'class' => Editeur::class,
                'choice_label' => 'nomPrenom',
                'placeholder' => 'Sélectionnez un éditeur',
            ])
            ->add('auteurs', EntityType::class, [
                'class' => Auteur::class,
                'choice_label' => 'nomPrenom',
                'multiple' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
