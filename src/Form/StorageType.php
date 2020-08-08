<?php

namespace App\Form;

use App\Entity\Storage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StorageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity', NumberType::class, [
                'attr' => [
                    'class' => 'easy-get easy-put'
                ]
            ])
            ->add('sufficient', ChoiceType::class, [
                'choices' => [
                    'Suffisant' => 'suffisant',
                    'Non suffisant' => 'non suffisant'
                ]
            ])
            ->add('structureStatus', ChoiceType::class, [
                'choices' => [
                    'Bonne' => 'bonne',
                    'Endommagé' => 'endommagé'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Storage::class,
        ]);
    }
}
