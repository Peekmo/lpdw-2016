<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Nom'
            ])
            ->add('description', TextareaType::class)
            ->add('ingredients', TextareaType::class)
            ->add('captcha', TextType::class, [
                'mapped' => false
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}
