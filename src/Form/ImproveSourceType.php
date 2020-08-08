<?php

namespace App\Form;

use App\Entity\ImproveSourceEquipmentType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImproveSourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('superstructure', CheckboxType::class, [
                'required' => false
            ])
            ->add('pipeline', CheckboxType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ImproveSourceEquipmentType::class,
        ]);
    }
}
