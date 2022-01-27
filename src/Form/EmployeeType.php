<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('civility', ChoiceType::class, [
                'attr' => ['class' => 'd-flex justify-content-around'],
                'choices' => [
                    'Monsieur' => 'M.',
                    'Madame' => 'Mme'
                ],
                'label' => false,
                'expanded' => true, 'multiple' => false
            ])
            ->add('lastname', TextType::class, ['label' => 'Nom'])
            ->add('firstname', TextType::class, ['label' => 'Prénom'])
            ->add('pictureFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Delete',
                'download_uri' => false
            ])
            ->add('role', TextType::class, ['label' => 'Rôle']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
