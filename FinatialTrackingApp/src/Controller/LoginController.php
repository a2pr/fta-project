<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index( Request $request)
    {
/*        $entityManager = $this->getDoctrine()->getManager();

        $userRepo = $entityManager->getRepository(Users::class);

        $test = $userRepo->findUserByEmail('a2payema@gmail.com', '123456');*/

        /*dump($test);die;*/

        $user = new Users();
        $form = $this->createFormBuilder($user)
            ->add('email', TextType::class)
            ->add('password', PasswordType::class)
            ->add('save', SubmitType::class, ['label' => 'Login Task'])
            ->getForm();

        if($form->isSubmitted() && $form->isValid()){

            try{
                $userTemp= $form->getData();
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
