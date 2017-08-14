<?php
namespace AppBundle\Controller\Rest;

use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Category;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

class BlogRestController extends FOSRestController
{
    /**
     * @Rest\Get("/rest/blog")
     */
    public function getAction()
    {
        $blogs = $this->getDoctrine()
            ->getRepository(BlogPost::class)
            ->findAll();
        if ($blogs === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $blogs;
    }

    /**
     * @Rest\Get("/rest/blog/{id}")
     */
    public function idAction($id)
    {
        $blog = $this->getDoctrine()->getRepository(BlogPost::class)->find($id);
        if ($blog === null) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        }
        return $blog;
    }

    /**
     * @Rest\Post("/rest/blog/")
     * @param Request $request
     */
    public function postAction(Request $request)
    {
        $blog = new BlogPost();
        $this->get('manager_blog')->addBlog($blog, $request);
    }
}