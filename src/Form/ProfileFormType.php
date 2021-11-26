<?php

namespace App\Form;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileFormType extends AbstractType
{
    private $user;

    public function __construct(Security $security) 
    {
        $this->user = $security->getUser();
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, [
                'data' => $this->user->getFirstName()
            ])
            ->add('last_name', TextType::class, [
                'data' => $this->user->getLastName()
            ])
            ->add('photo', FileType::class, [
                'label' => 'Update photo'
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
