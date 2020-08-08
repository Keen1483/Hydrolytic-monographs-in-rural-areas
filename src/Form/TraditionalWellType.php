<?php

namespace App\Form;

use App\Entity\TraditionalWellEquipmentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TraditionalWellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bucket', CheckboxType::class, [
                'required' => false
            ])
            ->add('rope', CheckboxType::class, [
                'required' => false
            ])
            ->add('lid', CheckboxType::class, [
                'required' => false
            ])
            ->add('pulley', CheckboxType::class, [
                'required' => false
            ])
            ->add('superstructure', CheckboxType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TraditionalWellEquipmentType::class,
        ]);
    }
}
