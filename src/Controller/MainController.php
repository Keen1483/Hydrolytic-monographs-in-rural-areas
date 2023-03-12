<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class MainController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/", name="app_homepage")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->setCreatedAt(new \DateTime())
                ->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()))
            ;

            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('main/index.html.twig', [
            'title' => 'Accueil',
            'form_user' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin", name="admin_page")
     */
    public function admin()
    {
        return $this->render('main/admin.html.twig');
    }

    /**
     * @Route("/user/redirect", name="redirect")
     */
    public function afterConnected()
    {
        return $this->render('main/redirect.html.twig');
    }

    /**
     * @Route("/user", name="user")
     */
    public function userConnect()
    {
        return $this->render('main/user_connect.html.twig');
    }

    /**
     * @Route("/ajax", name="ajax")
     */
    public function ajaxAction(Request $request)
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        
        if ($request->isXmlHttpRequest()) {
            $jsonData = [];
            foreach ($users as $user) {
                $temp = [
                    'email' => $user->getEmail(),
                    'username' => $user->getName(),
                ];
                $jsonData[] = $temp;
            }

            return new JsonResponse($jsonData);
        } else {
            return $this->render('main/ajax.html.twig', [
                'title' => 'Ajax request',
            ]);
        }
        
    }
}
