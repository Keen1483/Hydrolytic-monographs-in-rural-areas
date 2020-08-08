<?php

namespace App\Form;

use App\Entity\Aep;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('depth', NumberType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'easy-get easy-put depth'
                ]
            ])
            ->add('buildingYear', TextType::class, [
                'attr' => [
                    'class' => 'datepicker'
                ]
            ])
            ->add('funding', ChoiceType::class, [
                'choices' => [
                    'CAS' => 'CAS',
                    'BIP' => 'BIP'
                ]
            ])
            ->add('productionCapacity', NumberType::class, [
                'attr' => [
                    'class' => 'easy-get easy-put'
                ]
            ])
            ->add('networkLength', NumberType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'easy-get easy-put'
                ]
            ])
            ->add('adductionType', ChoiceType::class, [
                'choices' => [
                    'Par refoulement' => 'par refoulement',
                    'Par gravitation' => 'par gravitation',
                    'Mixte' => 'mixte'
                ]
            ])
            ->add('linearNetwork', TextType::class, [
                'required' => false
            ])
            ->add('operatingState', ChoiceType::class, [
                'choices' => [
                    'Fonctionnel' => 'fonctionnel',
                    'Non fonctionnel' => 'non fonctionnel'
                ]
            ])
        ;

        // Import secondary forms
        $builder
            ->add('stickingBack', CollectionType::class, [
                'entry_type' => StickingBackType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('storage', CollectionType::class, [
                'entry_type' => StorageType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('agentCommunicationMode', CollectionType::class, [
                'entry_type' => AgentCommunicationModeType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('equipmentAep', CollectionType::class, [
                'entry_type' => EquipmentAepType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('waterTraitmentAnalysis', CollectionType::class, [
                'entry_type' => WaterTraitmentAnalysisType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('managementMode', CollectionType::class, [
                'entry_type' => ManagementModeType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('fundingMode', CollectionType::class, [
                'entry_type' => FundingModeType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('maintenance', CollectionType::class, [
                'entry_type' => MaintenanceType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('aepPmh', CollectionType::class, [
                'entry_type' => DrillingPmhType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('aepImproveSource', CollectionType::class, [
                'entry_type' => ImproveSourceType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('aepTraditionalWell', CollectionType::class, [
                'entry_type' => TraditionalWellType::class,
                'entry_options' => ['label' => false],
            ])
            ->add('localInformations', CollectionType::class, [
                'entry_type' => LocalInformationsType::class,
                'entry_options' => ['label' => false],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aep::class,
        ]);
    }
}
