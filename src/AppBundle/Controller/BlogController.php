<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Comments;
use AppBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $blogs = $this->getDoctrine()
            ->getRepository(BlogPost::class)
            ->findAll();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'blogs' => $blogs
        ]);
    }

    public function showAction($slug, Request $request)
    {
        $item = $this->getDoctrine()
            ->getRepository(BlogPost::class)
            ->find($slug);

        $commentItems = $this->getDoctrine()
            ->getRepository(Comments::class)
            ->findByBlogId($item->getId());

        $comment = new Comments();
        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();
            $this->get('manager_comment')->addComment($item, $this->getUser(), $comment);
        }

        return $this->render('default/show.html.twig', [
            'form' => $form->createView(),
            'item' => $item,
            'commentItems' => $commentItems
        ]);
    }
}
