<?php

namespace App\Controller;

use App\Entity\Incomes;
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
        $incomes = new Incomes();
        $transaction->setDtc(new \DateTime());
        $form = $this->createForm(TransactionType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($request);die;
            try {
                $transTemp = $form->getData();
                $this->addFlash(
                    'notice',
                    'Log in'
                );
                return $this->redirect('/dashboard');
            } catch (\Exception $e) {

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
