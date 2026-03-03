<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Livre;
use App\Enum\NationaliteEnum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPrenom', TextType::class, [
            ])
            ->add('date_naissance', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'placeholder' => 'Donnez la date de naissance de l\'auteur',
            ])
            ->add('date_deces', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                'required' => false,
                'placeholder' => 'Laisser vide si l\'auteur est encore en vie',
            ])
            ->add('nationalite', EnumType::class, [
                'class' => NationaliteEnum::class,
                'choice_label' => fn(NationaliteEnum $choice) => $choice->getLabel(),
                'placeholder' => 'Sélectionnez une nationalité',
            ])
            ->add('livres', EntityType::class, [
                'class' => Livre::class,
                'choice_label' => 'titre',
                'multiple' => true,
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
