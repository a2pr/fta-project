<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpensesTransactionType extends AbstractType
{
    private const EXPENSES_REASONS = [
        'Payment' => 'payment',
        'Cut credit card' => 'cut card'
    ];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'reason',
                ChoiceType::class,
                [
                    'choices' => self::EXPENSES_REASONS
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
                // Configure your form options here
            ]
        );
    }
}
