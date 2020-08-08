<?php

namespace App\Form;

use App\Entity\AgentCommunicationMode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgentCommunicationModeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contract', CheckboxType::class, [
                'required' => false
            ])
            ->add('capacityBuilding', CheckboxType::class, [
                'required' => false
            ])
            ->add('others', TextareaType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AgentCommunicationMode::class,
        ]);
    }
}
