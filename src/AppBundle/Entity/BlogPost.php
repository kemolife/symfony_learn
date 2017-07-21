<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * BlogPost
 *
 * @ORM\Table(name="blog_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BlogPostRepository")
 */
class BlogPost
{

    const SERVER_PATH_TO_file_FOLDER = '../../../web/upload/files';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft = false;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="blogPosts")
     */
    private $category;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated", nullable=true)
     */
    private $updated;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return BlogPost
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return BlogPost
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     *
     * @return BlogPost
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;

        return $this;
    }

    /**
     * Get draft
     *
     * @return bool
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * @param Category $category
     * @return BlogPost
     */

    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return mixed
     */

    public function getCategory()
    {
        return $this->category;
    }
    

    /**
     * Set updated
     *
     * @param string $updated
     * @return BlogPost
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }


}

