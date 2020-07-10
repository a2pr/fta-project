<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Dtc', DateTimeType::class,[
                'label'=>'Date of entry:'
            ])
            ->add('amount', MoneyType::class,[
                'currency'=>false
            ])
            ->add('money', ChoiceType::class,[
                'choices'=>[
                    'Pounds £'=> '£',
                    'Reales R$'=>'R$',
                    'USD $'=>'$'
                ]
            ])
            ->add('operation', ChoiceType::class,[
                'attr' => ['id' => 'operationType'],
                'choices'=>[
                    'choose your operation'=>'',
                    'Income'=> '0',
                    'Expenses'=>'1',
                    'Movement'=>'2'
                ],

            ])->add('income',IncomeTransactionType::class)
            ->add('expenses', ExpensesTransactionType::class)
            ->add('movements', MovementsTransactionType::class)
            ->add('save', SubmitType::class)
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            //var_dump($event->getData());
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            /*'data_class' => Transactions::class,*/
        ]);
    }
}
