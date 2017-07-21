<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var int
     * 
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="massage", type="string", length=255, nullable=false)
     */
    private $massage;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set massage
     *
     * @param string $massage
     *
     * @return Comments
     */
    public function setMassage($massage)
    {
        $this->massage = $massage;

        return $this;
    }

    /**
     * Get massage
     *
     * @return string
     */
    public function getMassage()
    {
        return $this->massage;
    }
    

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Comments
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set author
     *
     * @param \AppBundle\Entity\User $author
     *
     * @return Comments
     */
    public function setAuthor(\AppBundle\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \AppBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
