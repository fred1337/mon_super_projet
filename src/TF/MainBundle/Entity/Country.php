<?php

namespace TF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="TF\MainBundle\Repository\CountryRepository")
 */
class Country
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
     * @var string
     *
     * @ORM\Column(name="ISO", type="string", length=4, unique=true)
     */
    private $iSO;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;


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
     * Set iSO
     *
     * @param string $iSO
     *
     * @return Country
     */
    public function setISO($iSO)
    {
        $this->iSO = $iSO;

        return $this;
    }

    /**
     * Get iSO
     *
     * @return string
     */
    public function getISO()
    {
        return $this->iSO;
    }

    /**
     * Set options
     *
     * @param string $options
     *
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get options
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

