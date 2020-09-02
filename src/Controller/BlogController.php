<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\ArticleFormType;
use App\Form\CommentType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog", name="blog_")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function blogHome()
    {
        return $this->render('blog/blog.html.twig', [
            'title' => 'Blog',
        ]);
    }

    /**
     * @Route("/articles", name="articles")
     */
    public function index(ArticleRepository $repo)
    {
        $articles = $repo->findAll();
        return $this->render('blog/articles.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles,
            'title' => 'Liste des article'
        ]);
    }

    /**
     * @Route("/{id<\d+>}", name="show")
     */
    public function showArticle(Article $article, Request $request, EntityManagerInterface $entityManager)
    {
        $comment = new Comment();

        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $comment->setCreatedAt(new \DateTime())
                    ->setArticle($article);

            $comment = $form->getData();

            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('blog_show', ['id' => $article->getId()], 301);
        }

        return $this->render('blog/show_article.html.twig', [
            'article' => $article,
            'comment' => $form->createView(),
            'title' => $article->getTitle(),
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @Route("/{id}/edit", name="edit")
     */
    public function formArticle(Article $article = null, Request $request, EntityManagerInterface $entityManager)
    {
        if(!$article) {
            $article = new Article();
        }

        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            if(!$article->getId()) {
                $article->setCreatedAt(new \DateTime());
            }

            $article = $form->getData();

            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('blog_show', ['id' => $article->getId()], 301);
        }

        return $this->render('blog/form_article.html.twig', [
            'form_article' => $form->createView(),
            'edit_mode' => $article->getId() !== null,
            'title' => 'Créer un article'
        ]);
    }
}
