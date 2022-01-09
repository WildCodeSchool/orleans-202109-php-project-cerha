<?php

namespace App\Form;

use App\Entity\Candidat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComplementaryQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('timeSearch', TextType::class, [
                'label' => 'Depuis combien de temps êtes-vous en recherche active ?'
                ])
            ->add('searchQuality', TextType::class, [
                'label' => 'Vous qualifierez votre recherche : d\'efficace, 
                pas assez ciblée, vous ne savez pas par où commencer :'
                ])
            ->add('profilQuality', TextType::class, [
                'label' => 'Vous qualifierez votre profil : d\'attractif, de rare, d\'atypique, commun :'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
