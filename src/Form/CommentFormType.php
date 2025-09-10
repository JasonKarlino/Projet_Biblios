<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomAuteur', null, [
                'label' => 'Nom de l\'auteur',
            ])
            ->add('mailAuteur', EmailType::class, [
                'label' => 'Email de l\'auteur',
            ])
            ->add('dateCreation', null, [
                'label' => 'Date de création',
            ])
            ->add('datePublication', null, [
                'label' => 'Date de publication',
            ])
            ->add('statut', null, [
                'label' => 'Statut',
            ])
            ->add('livre', null, [
                'label' => 'Livre',
            ])
            ->add('contenu', null, [
                'label' => 'Contenu',
            ])
            ->add('mycheckbox', CheckboxType::class, [
                'label' => 'Accepter les termes et conditions',
                'label_attr' => ['class' => 'checkbox-inline checkbox-switch'],
                'mapped' => false,
                'required' => true,
            ])
            ->add('myradio', RadioType::class, [
                'label' => 'Choisir cette option',
                'label_attr' => ['class' => 'radio-inline radio-switch'],
                'mapped' => false,
                'required' => true,
            ])
            ->add('myChoice', ChoiceType::class, [
                'label' => 'Choisir voter langage préféré',
                'mapped' => false,
                'required' => true,
                'choices'  => [
                    'Java' => 'option1',
                    'C++' => 'option2',
                    'Symfony' => 'option3',
                ],
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer le commentaire',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
