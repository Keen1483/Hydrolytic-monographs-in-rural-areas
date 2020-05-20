<?php

namespace App\Form;

use App\Entity\DrillingPmh;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DrillingPmhType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pompBrand')
            ->add('pumpPower')
            ->add('superstructure')
            ->add('drainingChannel')
            ->add('aep')
        ;

        // Import "LostWellType form" into "DrillingPmhType form"
        $builder->add('lostWell', CollectionType::class, [
            'entry_type' => LostWellType::class,
            'entry_options' => ['label' => false],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DrillingPmh::class,
        ]);
    }
}
