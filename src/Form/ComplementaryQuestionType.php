<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ComplementaryQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('timeSearch', TextType::class, [
                'label' => false,
            ])
            ->add('searchQuality', TextType::class, [
                'label' => false,
            ])
            ->add('profilQuality', TextType::class, [
                'label' => false,
            ])
            ->add('helpNeeded', TextareaType::class, [
                'label' => false,
                'attr' => ['rows' => 6]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
