<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class CarEntryForm extends AbstractType
{
    const YEAR_DIFF = 25;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date', DateType::class, [
            'required' => true,
            'widget' => 'choice',
            'format' => 'dd.MM.yyyy',
            'data' => new \DateTime(),
            'years' => $this->getYearsRange()
        ]);

        $builder->add('mileage', IntegerType::class, []);

        $builder->add('carActions', EntityType::class, [
            'class' => 'AppBundle:CarAction',
            'choice_label' => 'name',
            'multiple' => true,
        ]);

        $builder->add('save', SubmitType::class, [
            'label' => 'Save'
        ]);
    }

    /**
     * @return array
     */
    private function getYearsRange()
    {
        $currentYear = (int) (new \DateTime())->format('Y');

        $yearsRange = [];
        for ($i = $currentYear; $i >= $currentYear - self::YEAR_DIFF ; $i--) {
            $yearsRange[] = $i;
        }

        return $yearsRange;
    }
}