<?php

namespace TF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="TF\MainBundle\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @var Options
     * @ORM\OneToOne(targetEntity="TF\MainBundle\Entity\Options", cascade={"persist", "remove"})
     */
    private $Options;

    /**
     * @var Picture
     * @ORM\OneToOne(targetEntity="TF\MainBundle\Entity\Picture")
     */
    private $MainPicture;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="TF\MainBundle\Entity\Picture", mappedBy="hotel")
     */
    private $Pictures;

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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="City", type="string", length=255)
     */
    private $city;

    /**
     * @var float
     *
     * @ORM\Column(name="Price", type="float")
     */
    private $price;


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
     * Set name
     *
     * @param string $name
     *
     * @return Hotel
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
     * Set city
     *
     * @param string $city
     *
     * @return Hotel
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Hotel
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return Picture
     */
    public function getMainPicture()
    {
        return $this->MainPicture;
    }

    /**
     * @param Picture $MainPicture
     */
    public function setMainPicture($MainPicture)
    {
        $this->MainPicture = $MainPicture;
    }

    /**
     * @return array
     */
    public function getPictures()
    {
        return $this->Pictures;
    }

    /**
     * @param Picture
     */
    public function addPicture(Picture $Picture)
    {
        $this->Pictures[] = $Picture;
    }
    public function removePicture(Picture $picture)
    {
        //TO DO
    }
    public function __construct()
    {
        $this->Pictures = array();
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->Options;
    }

    /**
     * @param mixed $Options
     */
    public function setOptions($Options)
    {
        $this->Options = $Options;
    }
}

