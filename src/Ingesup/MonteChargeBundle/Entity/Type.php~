<?php

namespace Ingesup\MonteChargeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ingesup\MonteChargeBundle\Entity\Difficulty;

/**
 * Type
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ingesup\MonteChargeBundle\Entity\TypeRepository")
 */
class Type
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
     * @ORM\OneToOne(targetEntity="Ingesup\MonteChargeBundle\Entity\Difficulty", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $difficulty;


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
     * @return Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return Type
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Difficulty
     *
     * @param \Ingesup\MonteChargeBundle\Entity\Difficulty $difficulty
     * @return Type
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * Get difficulty
     *
     * @return \Ingesup\MonteChargeBundle\Entity\Difficulty
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }
}
