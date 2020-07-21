<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class ,[
                'attr'=>[
                    'placeholder'=>'test@email.com'
                ]
            ])
            ->add('name', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Your Name'
                ]
            ])
            ->add('lastname', TextType::class,[
                'attr'=>[
                    'placeholder'=>'Your lastname'
                ]
            ])
            ->add('password', PasswordType::class, [
                'attr'=>[
                    'placeholder'=>'Your password'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
