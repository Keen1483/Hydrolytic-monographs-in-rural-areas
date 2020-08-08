<?php

namespace App\Form;

use App\Entity\StickingBack;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StickingBackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('exist', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Existant' => 'existant',
                    'Non existant' => 'non existant'
                ]
            ])
            ->add('comments', TextareaType::class, [
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StickingBack::class,
        ]);
    }
}
