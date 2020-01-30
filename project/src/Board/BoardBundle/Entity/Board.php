<?php

namespace Board\BoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 *@ORM\Entity
 *@ORM\Table(name="board")
 */
class Board
{
    /**
     *  @ORM\Id
     *  @ORM\Column(name="id",type="integer")
     *  @ORM\GeneratedValue
     */
    protected $id;

    /**
     *   @ORM\ManyToOne(targetEntity="User", inversedBy="user")
     *   @ORM\JoinColumn(name="name_id")
     */
    protected $user;

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

   
     public function __construct()
    {
         $this->user = new ArrayCollection();
         
    }

    //public function __toString() 
    //{
    //   return  $this->getUser();
    //} 

    /**
     * Get name_id
     *
     * @return integer 
     */
    public function getName_Id()
    {
        return $this->name_id;
    }

    /**
     * Set name_id
     *
     * @param integer nameid
     * @return Board
     */
    public function setName_Id($name_id)
    {
        $this->name_id = $name_id;

        return $this;
    }

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
     * Set user1
     *
     * @param string $user1
     * @return Board
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user1
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Board
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
     * @return Board
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
     * Set updateTime
     *
     * @param \DateTime $updateTime
     * @return Board
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;

        return $this;
    }

    /**
     * Get updateTime
     *
     * @return \DateTime 
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }
}
