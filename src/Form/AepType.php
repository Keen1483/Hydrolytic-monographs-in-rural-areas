<?php

namespace App\Form;

use App\Entity\Aep;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('depth')
            ->add('buildingYear')
            ->add('funding')
            ->add('productionCapacity')
            ->add('networkLength')
            ->add('adductionType')
            ->add('linearNetwork')
            ->add('operatingState')
            ->add('createdAt')
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
