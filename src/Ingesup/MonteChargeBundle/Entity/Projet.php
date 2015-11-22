<?php

namespace Ingesup\MonteChargeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ingesup\MonteChargeBundle\Entity\ProjetRepository")
 */
class Projet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=255)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="groupe", type="string", length=255)
     */
    private $groupe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="datetime")
     */
    private $deadline;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text")
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="manager", type="string", length=255)
     */
    private $manager;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * @return Projet
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
     * Set class
     *
     * @param string $class
     * @return Projet
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set groupe
     *
     * @param string $groupe
     * @return Projet
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return string 
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     * @return Projet
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime 
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Projet
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set manager
     *
     * @param string $manager
     * @return Projet
     */
    public function setManager($manager)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return string 
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Projet
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
