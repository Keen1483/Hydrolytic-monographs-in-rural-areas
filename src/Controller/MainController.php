<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index(UserRepository $repo)
    {
        $users = $repo->findAll();

        return $this->render('main/index.html.twig', [
            'users' => $users,
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
     * @Route("/new-user", name="new_user")
     */
    public function formUser(Request $request, EntityManagerInterface $entityManager)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        dump($user->getPassword());
        dump($this->passwordEncoder->encodePassword($user, $user->getPassword()));

        if($form->isSubmitted() && $form->isValid()) {
            $user->setCreatedAt(new \DateTime())
                ->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()))
            ;

            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('aep_home');
        }

        return $this->render('main/form_user.html.twig', [
            'form_user' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user", name="user")
     */
    public function userConnect()
    {
        return $this->render('main/user_connect.html.twig');
    }
}
