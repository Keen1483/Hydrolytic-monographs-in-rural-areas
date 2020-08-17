<?php

namespace App\Form;

use App\Entity\WaterTraitmentAnalysis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WaterTraitmentAnalysisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('unitTraitmentPresence', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'oui',
                    'Non' => 'non'
                ]
            ])
            ->add('analysisFrequency', ChoiceType::class, [
                'choices' => [
                    'Par jour' => 'par jour',
                    'Par semaine' => 'par semaine',
                    'Par mois' => 'par mois',
                    'Par trimestre' => 'par trimestre',
                    'Par semestre' => 'par semestre',
                    'Par année' => 'par année'
                ]
            ])
            ->add('lastAnalysisAt', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('appliedTraitmentType', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => WaterTraitmentAnalysis::class,
        ]);
    }
}
