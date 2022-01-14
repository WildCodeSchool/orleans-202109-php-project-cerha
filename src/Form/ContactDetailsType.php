<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use App\Form\UserCandidateType;

class ContactDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', UserCandidateType::class, ['label' => false ])
            ->add('birthDate', BirthdayType::class, ['label' => 'Date de naissance'])
            ->add('address', TextType::class, ['label' => 'Adresse'])
            ->add('postalCode', TextType::class, ['label' => 'Code postal'])
            ->add('city', TextType::class, ['label' => 'Ville']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
