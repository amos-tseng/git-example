<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Post")
 */
class Post
{
     /**
     *  @ORM\Id
     *  @ORM\Column(name="id",type="integer")
     *  @ORM\GeneratedValue
     */
    protected $id;

    /**
     * 
     *
     *  @ORM\Column(name="name", type="string", length=40, nullable=FALSE)
     */
    protected $name;

    /**
     * 
     *
     *  @ORM\Column(name="title", type="string", length=80, nullable=FALSE)
     */
    protected $title;

    /**
     * 
     *
     *  @ORM\Column(name="message", type="text")
     */
    protected $message;

    /**
     * 
     *
     *  @ORM\Column(name="update_time", type="datetime")
     */
    protected $updateTime;


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
     * Set name
     *
     * @param string $name
     * @return Post
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
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
     * Set message
     *
     * @param string $message
     * @return Post
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set updatetime
     *
     * @param \DateTime $updatetime
     * @return Post
     */
    public function setUpdatetime($updatetime)
    {
        $this->updatetime = $updatetime;

        return $this;
    }

    /**
     * Get updatetime
     *
     * @return \DateTime 
     */
    public function getUpdatetime()
    {
        return $this->updatetime;
    }
}
