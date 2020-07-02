<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovementsTransactionType extends AbstractType
{
    private const MOVEMENTS_REASONS = [
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
                    'choices' => self::MOVEMENTS_REASONS
                ]
            )
            ->add('description', TextType::class)
            ->add('amountOutput', MoneyType::class,[
                'label'=>'Amount Output',
                'currency'=>false
            ])
            ->add('moneyOutput', ChoiceType::class,[
                'choices'=>[
                    'Pounds £'=> '£',
                    'Reales R$'=>'R$',
                    'USD $'=>'$'
                ]
            ])
            ->add('banksOutput', ChoiceType::class, [])/*Populate banks by customer adding*/
            ->add('amountArriving', MoneyType::class,[
                'label'=>'Amount Arriving',
                'currency'=>false
            ])
            ->add('moneyArriving', ChoiceType::class,[
                'choices'=>[
                    'Pounds £'=> '£',
                    'Reales R$'=>'R$',
                    'USD $'=>'$'
                ]
            ])
            ->add('banksArriving', ChoiceType::class, [])/*Populate banks by customer adding*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
