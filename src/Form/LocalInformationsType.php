<?php

namespace App\Form;

use App\Entity\LocalInformations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalInformationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('region', TextType::class)
            ->add('borough', TextType::class)
            ->add('locality', TextType::class)
            ->add('district', TextType::class)
            ->add('population', NumberType::class, [
                'attr' => [
                    'class' => 'easy-get easy-put'
                ]
            ])
            ->add('department', TextType::class)
        ;

        // Import "GpsCoordinatesType form" into "LocalInformationsType form"
        $builder->add('gpsCoordinates', CollectionType::class, [
            'entry_type' => GpsCoordinatesType::class,
            'entry_options' => ['label' => false],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LocalInformations::class,
        ]);
    }
}
