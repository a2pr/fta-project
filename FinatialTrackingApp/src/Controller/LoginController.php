<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints as Assert;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index( Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $userRepo = $entityManager->getRepository(Users::class);

        $user = new Users();
        $form = $this->createFormBuilder($user)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->getForm();

        $form->handleRequest($request);
        //var_dump($form->getData());
        if($form->isSubmitted() && $form->isValid()){

            try{
                $userTemp= $form->getData();
                $sessionUser=  $userRepo->findUserByLogin($userTemp);

                if($sessionUser instanceof Users){
                    $this->addFlash(
                        'notice',
                        'Log in'
                    );
                    return $this->redirect('/dashboard');
                }

            }catch (\Exception $e){

            }
        }
        return $this->render(
            'login/index.html.twig',
            [
             'form'=>$form->createView()
            ]
        );


    }
}
