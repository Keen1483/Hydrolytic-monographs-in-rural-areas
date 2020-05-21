<?php

namespace App\Form;

use App\Entity\LocalInformations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalInformationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('region')
            ->add('borough')
            ->add('locality')
            ->add('district')
            ->add('population')
            ->add('department')
            ->add('aep')
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
