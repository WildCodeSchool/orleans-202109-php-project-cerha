<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class CompanyDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('denomination', TextType::class, [
                'label' => 'Dénomination',
            ])
            ->add('siret', TextType::class, [
                'label' => 'SIRET',
            ])
            ->add('apeCode', TextType::class, [
                'label' => 'Code APE',
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code postal'
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
            ])
            ->add('companyNumber', TextType::class, [
                'label' => 'Numéro de téléphone',
                'required' => false
            ])
            ->add('vatNumber', TextType::class, [
                'label' => 'TVA',
            ])
            ->add('businessArea', TextType::class, [
                'label' => 'Domaine d\'activité',
            ])
            ->add('collectiveAgreement', TextType::class, [
                'label' => 'Convention collective',
            ])
            ->add('website', UrlType::class, [
                'label' => 'Site internet',
                'required' => false
            ])
            ->add('linkedin', UrlType::class, [
                'label' => 'Linkedin',
                'required' => false
            ])
            ->add('facebook', UrlType::class, [
                'label' => 'Facebook',
                'required' => false
            ])
            ->add('instagram', UrlType::class, [
                'label' => 'Instagram',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
            'validation_groups' => ['Default', 'company']
        ]);
    }
}
