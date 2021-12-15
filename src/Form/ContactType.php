<?php

namespace App\Form;

use App\Entity\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('company', CheckboxType::class,array('label'=>'Entreprise'))
            ->add('candidate', CheckboxType::class,array('label'=>'Candidat'))
            ->add('firstName', TextType::class,array('label'=>'Nom'))
            ->add('lastName', TextType::class,array('label'=>'Prénom'))
            ->add('phone', TextType::class,array('label'=>'Téléphone'))
            ->add('email', TextType::class,array('label'=>'E-mail'))
            ->add('message', TextareaType::class,array('label'=>'Message'))
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class
        ]);
    }
}
