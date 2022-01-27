<?php

namespace App\Form;

use App\Entity\ServiceCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ServiceCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'Public visé',
                'choices' => [
                    'Entreprise' => 'Entreprise',
                    'Candidat' => 'Candidat'
                ]
            ])
            ->add('title', TextType::class, [
                'label' => 'Nom de la catégorie'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ServiceCategory::class,
        ]);
    }
}
