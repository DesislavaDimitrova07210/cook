<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Receipt
 *
 * @ORM\Table(name="receipts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReceiptRepository")
 */
class Receipt
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_cooking", type="time")
     */
    private $timeCooking;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_preparation", type="time")
     */
    private $timePreparation;

    /**
     * @ORM\ManyToOne(targetEntity="Subcategory", inversedBy="receipts")
     * @ORM\JoinColumn(name="subcategory_id", referencedColumnName="id")
     */
    private $subcategory;

    /**
     * Get id
     *
     * @return int
     */

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Products")
     * @ORM\JoinTable(name="receipts_products",
     *     joinColumns={@ORM\JoinColumn(name="receipt_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
     *     )
     */
    private $products;

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
     * @return Receipt
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
     * Set timeCooking
     *
     * @param \DateTime $timeCooking
     *
     * @return Receipt
     */
    public function setTimeCooking($timeCooking)
    {
        $this->timeCooking = $timeCooking;

        return $this;
    }

    /**
     * Get timeCooking
     *
     * @return \DateTime
     */
    public function getTimeCooking()
    {
        return $this->timeCooking;
    }

    /**
     * Set timePreparation
     *
     * @param \DateTime $timePreparation
     *
     * @return Receipt
     */
    public function setTimePreparation($timePreparation)
    {
        $this->timePreparation = $timePreparation;

        return $this;
    }

    /**
     * Get timePreparation
     *
     * @return \DateTime
     */
    public function getTimePreparation()
    {
        return $this->timePreparation;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;

    }

    /**
     * @param ArrayCollection $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }
    /**
     * @return mixed
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * @param mixed $subcategory
     */
    public function setSubcategory($subcategory)
    {
        $this->subcategory = $subcategory;
    }
}

