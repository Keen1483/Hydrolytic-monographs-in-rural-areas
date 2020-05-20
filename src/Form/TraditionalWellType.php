<?php

namespace App\Form;

use App\Entity\TraditionalWellEquipmentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraditionalWellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bucket')
            ->add('rope')
            ->add('lid')
            ->add('pulley')
            ->add('superstructure')
            ->add('aep')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TraditionalWellEquipmentType::class,
        ]);
    }
}
