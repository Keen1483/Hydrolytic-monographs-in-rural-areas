<?php

namespace App\Form;

use App\Entity\GpsCoordinates;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GpsCoordinatesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('latitude', NumberType::class, [
                'attr' => [
                    'class' => 'easy-get easy-put'
                ]
            ])
            ->add('longitude', NumberType::class, [
                'attr' => [
                    'class' => 'easy-get easy-put'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GpsCoordinates::class,
        ]);
    }
}
