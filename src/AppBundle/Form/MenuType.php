<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          // Obligatoire; longueur max : 200 chars;
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Nom'
            ])
            // Facultative
            ->add('description', TextareaType::class, [
                'required' => false
            ])

            // Obligatoire; longueur min : 50 chars;
            ->add('ingredients', TextareaType::class, [
                'required' => false,
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}
