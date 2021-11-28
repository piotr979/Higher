<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('image_url', FileType::class, [
                'label' => 'Cover image',
                'required' => false
            ])
            ->add('content',TextareaType::class, array(
                'attr' => array(
                    'class' => 'tinymce'
                )
                ))
            ->add(
                'color', 
                ChoiceType::class, 
                [
                    'choices' => [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                    ],
                'expanded' => true
                ]
            )
            ->add(
                'tags_id', EntityType::class, [
                    'class' => Tag::class,
                    'label' => "Select one or more tags",
                    'choice_label' => 'tag_title',
                    'multiple' => true
                ])
            ->add('submit', SubmitType::class)
                    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
