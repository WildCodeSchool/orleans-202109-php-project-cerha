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
            ->add('denomination', TextType::class, ['label' => 'Dénomination'])
            ->add('siret', TextType::class, ['label' => 'Siret'])
            ->add('apeCode', TextType::class, ['label' => 'Code APE'])
            ->add('address', TextType::class, ['label' => 'Adresse'])
            ->add('postalCode', TextType::class, ['label' => 'Code postal'])
            ->add('city', TextType::class, ['label' => 'Ville'])
            ->add('vatNumber', TextType::class, ['label' => 'TVA'])
            ->add('website', TextType::class, ['label' => 'Site internet'])
            ->add('linkedin', TextType::class, ['label' => 'Linkedin'])
            ->add('facebook', TextType::class, ['label' => 'Facebook'])
            ->add('instagram', TextType::class, ['label' => 'Instagram']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
