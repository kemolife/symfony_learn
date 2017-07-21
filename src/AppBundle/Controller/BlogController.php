<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Comments;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route("/", name="homepage")
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
        // create a task and give it some dummy data for this example
        $comment = new Comments();

        $form = $this->createFormBuilder($comment)
            ->add('massage', TextareaType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();
            $comment->setAuthor($this->getUser());
            $comment->setCreated(new \DateTime());
             $em = $this->getDoctrine()->getManager();
             $em->persist($comment);
             $em->flush();
        }

        $item = $this->getDoctrine()
            ->getRepository(BlogPost::class)
            ->find($slug);
        return $this->render('default/show.html.twig', [
            'form' => $form->createView(),
            'item' => $item
        ]);
    }
}
