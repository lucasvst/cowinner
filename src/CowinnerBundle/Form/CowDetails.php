<?php

namespace CowinnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CowDetails extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age', TextType::class)
            ->add('price', TextType::class)
            ->add('weight', TextType::class)
            ->add('add', SubmitType::class, array('label' => 'Add cow!'))
        ;
    }
}