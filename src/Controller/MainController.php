<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
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
}
