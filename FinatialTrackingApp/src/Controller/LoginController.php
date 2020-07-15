<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $userRepo = $entityManager->getRepository(Users::class);

        $user = new Users();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            try {
                $userTemp = $form->getData();
                $sessionUser = $userRepo->findUserByLogin($userTemp);

                if ($sessionUser instanceof Users) {
                    $this->addFlash(
                        'notice',
                        'Log in'
                    );
                    return $this->redirect('/dashboard');
                }

            } catch (\Exception $e) {
                throw $e;
            }
        }
        return $this->render(
            'login/index.html.twig',
            [
                'form' => $form->createView()
            ]
        );


    }
}
