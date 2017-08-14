<?php

namespace AppBundle\Manager;

use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Category;
use Doctrine\ORM\EntityManager;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogManager
{
    /**
     * @var EntityManager
     */
    public $em;

    /**
     * BlogManager constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param BlogPost $blog
     * @param Request $request
     * @return View
     */

    public function addBlog(BlogPost $blog, Request $request)
    {
        $title = $request->get('title');
        $body = $request->get('body');
        $draft = $request->get('draft');
        $categoryName = $request->get('category');
        $category = $this->em
            ->getRepository(Category::class)
            ->findByName($categoryName);
        if(empty($title) || empty($body)|| empty($draft))
        {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }
        $blog->setTitle($title);
        $blog->setBody($body);
        $blog->setCategory($category);
        $blog->setDraft($draft);
        $this->em->persist($blog);
        $this->em->flush();
        return new View("User Added Successfully", Response::HTTP_OK);
    }

    public function itemBlog()
    {

    }
}