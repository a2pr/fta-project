<?php

namespace App\Form;

use App\Entity\Incomes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IncomeTransactionType extends AbstractType
{
    private const INCOME_REASONS = [
        'Salary' => 'salary',
        'Other income' => 'others'
    ];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'reason',
                ChoiceType::class,
                [
                    'choices' => self::INCOME_REASONS
                ]
            )
            ->add('description', TextType::class)
            ->add('banks', ChoiceType::class, [])/*Populate banks by customer adding*/
            ->add('funds', ChoiceType::class)
            ->add('subFunds', ChoiceType::class) /*create a form type for each one ?*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Incomes::class
            ]
        );
    }
}
