<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AsideFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        $builder
            ->add('sortBy', ChoiceType::class, [
                'choices' => [
                    'Newest' => 'newest',
                    'Oldest' => 'oldest',
                'Most commented' => 'commented'
                ],
                'data' => $options['sorting']
            ])
            ->add('search', SearchType::class, [
                'required' => false
            ])
            ->add('apply', SubmitType::class, [
                'label' => 'Apply filters'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'sorting' => ''
            // Configure your form options here
        ]);
    }
}
