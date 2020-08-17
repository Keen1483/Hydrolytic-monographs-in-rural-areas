<?php

namespace App\Form;

use App\Entity\FundingMode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FundingModeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facturationMode', ChoiceType::class, [
                'choices' => [
                    'Par volume' => 'par volume',
                    'Taux forfaitaire' => 'taux forfaitaire',
                    'Aucun' => 'aucun'
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
            'data_class' => FundingMode::class,
        ]);
    }
}
