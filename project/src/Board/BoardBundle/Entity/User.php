<?php

namespace Board\BoardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Board\BoardBundle\Repository\UserRepository;
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
     *  @ORM\OneToMany(targetEntity="Board", mappedBy="user")
     *  @ORM\Column(name="users", type="string", length=40, nullable=FALSE , unique=true) 
     */
    private $users;

    /**
     * 
     *
     *  @ORM\Column(name="lasttime", type="datetime")
     */
    protected $lasttime;
     
     
    public function __construct()
    {
         $this->users = new ArrayCollection();
         
    }

    public function __toString() 
    {
       return  $this->getUsers();
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
     * Set users
     *
     * @param string $users
     * @return Users
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return string 
     */
    public function getUsers()
    {
        return $this->users;
    }
  
    /**
     * Set lasttime
     *
     * @param \DateTime $lasttime
     * @return Users
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
