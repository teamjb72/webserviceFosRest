<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="customerNumber", columns={"customerNumber"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orderNumber", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $ordernumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="orderDate", type="date", nullable=false)
     */
    private $orderdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requiredDate", type="date", nullable=false)
     */
    private $requireddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shippedDate", type="date", nullable=true)
     */
    private $shippeddate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=15, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", length=65535, nullable=true)
     */
    private $comments;

    /**
     * @var \AppBundle\Entity\Customers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customerNumber", referencedColumnName="customerNumber")
     * })
     */
    private $customernumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Products", inversedBy="ordernumber")
     * @ORM\JoinTable(name="orderdetails",
     *   joinColumns={
     *     @ORM\JoinColumn(name="orderNumber", referencedColumnName="orderNumber")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="productCode", referencedColumnName="productCode")
     *   }
     * )
     */
    private $productcode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productcode = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get ordernumber
     *
     * @return integer
     */
    public function getOrdernumber()
    {
        return $this->ordernumber;
    }

    /**
     * Set orderdate
     *
     * @param \DateTime $orderdate
     *
     * @return Orders
     */
    public function setOrderdate($orderdate)
    {
        $this->orderdate = $orderdate;

        return $this;
    }

    /**
     * Get orderdate
     *
     * @return \DateTime
     */
    public function getOrderdate()
    {
        return $this->orderdate;
    }

    /**
     * Set requireddate
     *
     * @param \DateTime $requireddate
     *
     * @return Orders
     */
    public function setRequireddate($requireddate)
    {
        $this->requireddate = $requireddate;

        return $this;
    }

    /**
     * Get requireddate
     *
     * @return \DateTime
     */
    public function getRequireddate()
    {
        return $this->requireddate;
    }

    /**
     * Set shippeddate
     *
     * @param \DateTime $shippeddate
     *
     * @return Orders
     */
    public function setShippeddate($shippeddate)
    {
        $this->shippeddate = $shippeddate;

        return $this;
    }

    /**
     * Get shippeddate
     *
     * @return \DateTime
     */
    public function getShippeddate()
    {
        return $this->shippeddate;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Orders
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Orders
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set customernumber
     *
     * @param \AppBundle\Entity\Customers $customernumber
     *
     * @return Orders
     */
    public function setCustomernumber(\AppBundle\Entity\Customers $customernumber = null)
    {
        $this->customernumber = $customernumber;

        return $this;
    }

    /**
     * Get customernumber
     *
     * @return \AppBundle\Entity\Customers
     */
    public function getCustomernumber()
    {
        return $this->customernumber;
    }

    /**
     * Add productcode
     *
     * @param \AppBundle\Entity\Products $productcode
     *
     * @return Orders
     */
    public function addProductcode(\AppBundle\Entity\Products $productcode)
    {
        $this->productcode[] = $productcode;

        return $this;
    }

    /**
     * Remove productcode
     *
     * @param \AppBundle\Entity\Products $productcode
     */
    public function removeProductcode(\AppBundle\Entity\Products $productcode)
    {
        $this->productcode->removeElement($productcode);
    }

    /**
     * Get productcode
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductcode()
    {
        return $this->productcode;
    }
}
