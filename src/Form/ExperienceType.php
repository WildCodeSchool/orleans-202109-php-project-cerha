<?php

namespace App\Form;

use App\Entity\Experience;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @SuppressWarnings
 */
class ExperienceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jobName', TextType::class, ['label' => 'Intitulé de poste'])
            ->add('place', TextType::class, ['label' => 'Nom de l\'entreprise'])
            ->add('contrat', null, [
                'choice_label' => 'name',
                'label' => 'Type d\'emploi',
                'placeholder' => 'Sélectionnez votre choix',
                'required'   => true,
            ])
            ->add('startDate', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('endDate', DateType::class, [
                'label' => 'Date de fin',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])

            ->add('description', TextareaType::class, ['label' => 'Description', 'attr' => ['rows' => '4']])
            ->add('referentName', TextType::class, ['label' => 'Référent', 'required' => false,])
            ->add('phoneReferent', TextType::class, ['label' => 'Téléphone du référent', 'required' => false,]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Experience::class,
        ]);
    }
}
