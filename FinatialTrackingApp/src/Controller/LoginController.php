<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\LoginType;
use App\Session\SessionHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(Request $request, SessionHandler $sessionHandler)
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
                    $sessionHandler->setUserSession($sessionUser);
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

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(SessionHandler $sessionHandler)
    {
        $sessionHandler->removeSession();
        return $this->redirect('/login');
    }
}
