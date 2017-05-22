<?php

namespace TF\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="TF\MainBundle\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @var Country
     * @ORM\ManyToOne(targetEntity="TF\MainBundle\Entity\Country")
     */
    private $Country;
    /**
     * @var Options
     * @ORM\OneToOne(targetEntity="TF\MainBundle\Entity\Options", cascade={"persist", "remove"})
     */
    private $Options;

    /**
     * @var Picture
     * @ORM\OneToOne(targetEntity="TF\MainBundle\Entity\Picture", cascade={"persist"})
     */
    private $MainPicture;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="TF\MainBundle\Entity\Picture", mappedBy="hotel", cascade={"persist"})
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
     * @Assert\NotBlank(Message="pas touche petit con")
     * @assert\Length(max="25",  maxMessage="Le champ doit être inf à 25", min=2)
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
        $Picture->sethotel($this);
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

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param Country $Country
     */
    public function setCountry($Country)
    {
        $this->Country = $Country;
    }
}

