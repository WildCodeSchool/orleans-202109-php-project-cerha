<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('level', null, [
                'choice_label' => 'level',
                'label' => 'Niveau',
                'placeholder' => 'Sélectionnez votre choix',
                'required'   => true,
            ])
            ->add('title', TextType::class, ['label' => 'Intitulé de formation'])
            ->add('place', TextType::class, ['label' => 'Établissement'])
            ->add('startDate', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'choice',
                'years' => range(date('Y') + 0, date('Y') - 60),

                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour', 'required'   => true,
                ],
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Date de fin',
                'widget' => 'choice',
                'years' => range(date('Y') + 5, date('Y') - 60),
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour', 'required'   => true,
                ],
            ])
            ->add('description', TextareaType::class, ['label' => 'Description', 'attr' => ['rows' => '4']])
            ->add('referent', TextType::class, ['label' => 'Référent', 'required'   => false,])
            ->add('phoneReferent', TextType::class, ['label' => 'Téléphone du référent', 'required'   => false,]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
