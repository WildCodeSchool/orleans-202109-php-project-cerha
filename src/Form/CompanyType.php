<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('denomination')
            ->add('siret')
            ->add('apeCode')
            ->add('address')
            ->add('postalCode')
            ->add('city')
            ->add('vatNumber')
            ->add('contactRole')
            ->add('website')
            ->add('linkedin')
            ->add('facebook')
            ->add('instagram')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
