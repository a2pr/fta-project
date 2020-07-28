<?php

namespace App\Controller\Registration;

use App\Entity\Users;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Registration\CreateUser;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request, CreateUser $createUser)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new Users();
        $userRepo = $em->getRepository(Users::class);
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            try {
                $tempUser = $form->getData();

                //check if email is taken
                $validEmail = $userRepo->findUserByEmail($tempUser->getEmail());
                if ($validEmail instanceof Users) {
                    $useEmail = new FormError('Email is already used');
                    $form->addError($useEmail);
                    return $this->redirectToRoute('registration');
                }
                //save new user

                $tempUser = $createUser->createNewUser($tempUser);
                $em->persist($tempUser);
                $em->flush();

                return $this->redirectToRoute('dashboard');

            } catch (\Exception $e) {
                $form->addError(new FormError($e->getMessage()));
                return $this->redirectToRoute('registration');
            }

        }
        return $this->render(
            'registration/index.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
