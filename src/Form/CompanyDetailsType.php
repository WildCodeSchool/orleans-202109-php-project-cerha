<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CompanyDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('denomination', TextType::class, [
                'label' => 'Dénomination',
                'empty_data' => ''
            ])
            ->add('siret', TextType::class, [
                'label' => 'Siret',
                'empty_data' => ''
            ])
            ->add('apeCode', TextType::class, [
                'label' => 'Code APE',
                'empty_data' => ''
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'empty_data' => ''
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code postal',
                'empty_data' => ''
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'empty_data' => ''
            ])
            ->add('vatNumber', TextType::class, [
                'label' => 'TVA',
                'empty_data' => ''
            ])
            ->add('website', TextType::class, [
                'label' => 'Site internet',
                'required' => false
            ])
            ->add('linkedin', TextType::class, [
                'label' => 'Linkedin',
                'required' => false
            ])
            ->add('facebook', TextType::class, [
                'label' => 'Facebook',
                'required' => false
            ])
            ->add('instagram', TextType::class, [
                'label' => 'Instagram',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
