<?php

namespace App\Form;

use App\Entity\WaterTraitmentAnalysis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WaterTraitmentAnalysisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unitTraitmentPresence')
            ->add('analysisFrequency')
            ->add('lastAnalysisAt')
            ->add('appliedTraitmentType')
            ->add('aep')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WaterTraitmentAnalysis::class,
        ]);
    }
}
