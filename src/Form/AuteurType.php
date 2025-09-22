<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Livre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Enum\NationaliteEnum;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPrenom', TextType::class, [
                'label' => 'Nom et Prénoms de l\'auteur',
            ])
            ->add('date_naissance', DateType::class, [
                'input' => 'datetime_immutable',
                'label' => 'Date de naissance',
                'widget' => 'single_text',
            ])

            ->add('date_deces', DateType::class, [
                'input' => 'datetime_immutable',
                'label' => 'Date de décès',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('nationalite', EnumType::class, [
                'class' => NationaliteEnum::class,
                'label' => 'Nationalité',
                'choice_label' => function (?NationaliteEnum $nationalite) {
                    return $nationalite ? $nationalite->getLabel() : '';
                },
                'required' => false,
            ])
            ->add('livres', EntityType::class, [
                'class' => Livre::class,
                'choice_label' => 'titre',
                'multiple' => true,
                'label' => 'Livres',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}
