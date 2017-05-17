<?php

namespace TF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="options")
 * @ORM\Entity(repositoryClass="TF\MainBundle\Repository\OptionsRepository")
 */
class Options
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="Pool", type="boolean")
     */
    private $pool;

    /**
     * @var bool
     *
     * @ORM\Column(name="Internet", type="boolean")
     */
    private $internet;

    /**
     * @var bool
     *
     * @ORM\Column(name="Breakfast", type="boolean")
     */
    private $breakfast;


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
     * Set pool
     *
     * @param boolean $pool
     *
     * @return Options
     */
    public function setPool($pool)
    {
        $this->pool = $pool;

        return $this;
    }

    /**
     * Get pool
     *
     * @return bool
     */
    public function getPool()
    {
        return $this->pool;
    }

    /**
     * Set internet
     *
     * @param boolean $internet
     *
     * @return Options
     */
    public function setInternet($internet)
    {
        $this->internet = $internet;

        return $this;
    }

    /**
     * Get internet
     *
     * @return bool
     */
    public function getInternet()
    {
        return $this->internet;
    }

    /**
     * Set breakfast
     *
     * @param boolean $breakfast
     *
     * @return Options
     */
    public function setBreakfast($breakfast)
    {
        $this->breakfast = $breakfast;

        return $this;
    }

    /**
     * Get breakfast
     *
     * @return bool
     */
    public function getBreakfast()
    {
        return $this->breakfast;
    }
}

