<?php

namespace App\Controller;

use App\Entity\Transactions;
use App\Form\TransactionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

        $form = $this->createForm(TransactionType::class, $transaction);

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
