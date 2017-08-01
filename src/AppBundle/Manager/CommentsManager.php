<?php

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Comments;
use AppBundle\Entity\User;

class CommentsManager
{
    public $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function addComment(BlogPost $post, User $user, Comments $comment)
    {
        $comment->setAuthor($user);
        $comment->setCreated(new \DateTime());
        $comment->setBlogId($post);
        $this->em->persist($comment);
        $this->em->flush();
    }

}