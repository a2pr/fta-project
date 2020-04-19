<?php

namespace App\Form;

use App\Entity\Transactions;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Date')
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
            ->add('Operation', ChoiceType::class,[
                'choices'=>[
                    'Income'=> '0',
                    'Expenses'=>'1',
                    'Movement'=>'2'
                ]
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transactions::class,
        ]);
    }
}
