<?php

namespace CowinnerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class CowDetails extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('age', IntegerType::class)
            ->add('price', MoneyType::class, ['currency'=>'BRL'])
            ->add('weight', IntegerType::class)
            ->add('add', SubmitType::class, array('label' => 'Muuu!', 
            	'attr' => array('class' => 'btn-block btn-success')))
        ;
    }
}