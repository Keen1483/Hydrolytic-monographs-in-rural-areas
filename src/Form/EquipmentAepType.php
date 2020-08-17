<?php

namespace App\Form;

use App\Entity\EquipmentAep;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipmentAepType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pumpQuality', ChoiceType::class, [
                'choices' => [
                    'Pompe immergée solaire' => 'pompe immergée solaire',
                    'Pompe immergée raccordée à un réseau électrique' => 'pompe immergée raccordée à un réseau électrique',
                    'Pompe immergée raccordée à un groupe électrogène' => 'Pompe immergée raccordée à un groupe électrogène'
                ]
            ])
            ->add('others', TextareaType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EquipmentAep::class,
        ]);
    }
}
