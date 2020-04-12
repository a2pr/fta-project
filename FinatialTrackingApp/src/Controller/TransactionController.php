<?php

namespace App\Controller;

use App\Entity\Transactions;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends AbstractController
{
    /**
     * @Route("/transaction", name="transaction")
     */
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $transaction = new Transactions();

        $form = $this->createFormBuilder($transaction)
            ->add('date', DateTimeType::class)
            ->add('amount', MoneyType::class)
            ->add('operation',RadioType::class)
            ->getForm();

        $form->handleRequest($request);
        //var_dump($form->getData());
        if($form->isSubmitted() && $form->isValid()){
            try{
                $transTemp= $form->getData();
                //var_dump($form->getData());
                    $this->addFlash(
                        'notice',
                        'Log in'
                    );
                    return $this->redirect('/dashboard');
            }catch (\Exception $e){

            }
        }
        return $this->render(
            'transaction/index.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }
}
