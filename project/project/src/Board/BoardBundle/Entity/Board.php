<?php

namespace Board\BoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


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
     *  @ORM\ManyToOne(targetEntity="User", inversedBy="user")  
     *  @ORM\JoinColumn(name="user_id", referencedColumnName="id")
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
     * @return Board
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
