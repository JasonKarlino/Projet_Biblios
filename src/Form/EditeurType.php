<?php

namespace App\Form;

use App\Entity\Editeur;
use App\Entity\Livre as Entity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'éditeur',
            ])
            ->add('prenoms', TextType::class, [
                'label' => 'Prénoms de l\'éditeur',
            ])
            ->add('livres', EntityType::class, [
                'label' => 'Livres',
                'class' => Entity::class,
                'choice_label' => 'id',
                'multiple' => true,
                'required' => false,
            ])
            ->add('Ajouter', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => ['class' => 'btn btn-primary mt-3'],
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Editeur::class,
        ]);
    }
}
