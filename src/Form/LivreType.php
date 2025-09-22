<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Livre;
use App\Enum\LivreStatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du livre',
            ])
            ->add('image',  TextType::class, [
                'label' => 'URL de l\'image',
            ])
            ->add('numeroISBN', TextType::class, [
                'label' => 'Numéro ISBN',
            ])
            ->add('date_sortie', DateType::class, [
                'label' => 'Date de sortie',
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
            ->add('nombrePages', NumberType::class, [
                'label' => 'Nombre de pages',
            ])
            ->add('synopsis', TextareaType::class, [
                'label' => 'Synopsis',
            ])
            ->add('statut', EnumType::class, [
                'class' => LivreStatus::class,
                'label' => 'Statut',
            ])
            ->add('editeur', EntityType::class, [
                'label' => 'Éditeur',
                'class' => Editeur::class,
                'choice_label' => 'nom_prenom',
            ])
            ->add('auteurs', EntityType::class, [
                'label' => 'Auteurs',
                'class' => Auteur::class,
                'choice_label' => 'nom_prenom',
                'multiple' => true,
                'required' => false,
            ])
            ->add('Ajouter', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary mt-3'],
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
