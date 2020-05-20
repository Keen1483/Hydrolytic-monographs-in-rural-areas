<?php

namespace App\Form;

use App\Entity\DrillingPmh;
use Symfony\Component\Form\AbstractType;
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DrillingPmh::class,
        ]);
    }
}
