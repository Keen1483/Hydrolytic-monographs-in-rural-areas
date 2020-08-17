<?php

namespace App\Form;

use App\Entity\ManagementMode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ManagementModeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('managementAgent', ChoiceType::class, [
                'choices' => [
                    'Existence d’un comité de gestion' => 'existence d’un comité de gestion',
                    'Commune en régie' => 'commune en régie',
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
            'data_class' => ManagementMode::class,
        ]);
    }
}
