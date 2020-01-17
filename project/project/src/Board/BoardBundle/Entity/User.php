<?php

namespace Board\BoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *@ORM\Entity
 *@ORM\Table(name="user")
 */
class User
{
    /**
     *  @ORM\Id
     *  @ORM\Column(name="id",type="integer")
     *  @ORM\GeneratedValue
     */
    protected $id;

    /**
     *  
     *  @ORM\OneToMany(targetEntity="Board", mappedBy="name")
     *  @ORM\Column(name="user", type="string", length=40, nullable=FALSE , unique=true)
     */
    protected $user;

    /**
     * 
     *
     *  @ORM\Column(name="lasttime", type="datetime")
     */
    protected $lasttime;
    
   
    public function __construct()
    {
        $this->user = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }
  
    /**
     * Set lasttime
     *
     * @param \DateTime $lasttime
     * @return User
     */
    public function setLasttime($lasttime)
    {
        $this->lasttime = $lasttime;

        return $this;
    }

    /**
     * Get lasttime
     *
     * @return \DateTime 
     */
    public function getLasttime()
    {
        return $this->lasttime;
    }


}
