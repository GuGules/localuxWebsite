<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Formule;
use App\Entity\SansChauffeur;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SansChauffeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('formule', EntityType::class, [
                'class' => Formule::class,
                'choice_label' => 'id',
            ])
            ->add('dateDepart', null, [
                'widget' => 'single_text',
            ])
            ->add('dateRetour', null, [
                'widget' => 'single_text',
            ])
            ->add('vehicule', EntityType::class, [
                'class' => Vehicule::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SansChauffeur::class,
        ]);
    }
}
