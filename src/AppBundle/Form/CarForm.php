<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CarForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('name', TextType::class, [
            'required' => true
        ]);

        $builder->add('lengthUnit', EntityType::class, [
            'class' => 'AppBundle:LengthUnit',
            'choice_label' => 'name'
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Save'
        ]);
    }
}