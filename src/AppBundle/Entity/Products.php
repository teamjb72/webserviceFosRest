<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="productLine", columns={"productLine"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var string
     *
     * @ORM\Column(name="productCode", type="string", length=15)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $productcode;

    /**
     * @var string
     *
     * @ORM\Column(name="productName", type="string", length=70, nullable=false)
     */
    private $productname;

    /**
     * @var string
     *
     * @ORM\Column(name="productScale", type="string", length=10, nullable=false)
     */
    private $productscale;

    /**
     * @var string
     *
     * @ORM\Column(name="productVendor", type="string", length=50, nullable=false)
     */
    private $productvendor;

    /**
     * @var string
     *
     * @ORM\Column(name="productDescription", type="text", length=65535, nullable=false)
     */
    private $productdescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantityInStock", type="smallint", nullable=false)
     */
    private $quantityinstock;

    /**
     * @var string
     *
     * @ORM\Column(name="buyPrice", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $buyprice;

    /**
     * @var string
     *
     * @ORM\Column(name="MSRP", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $msrp;

    /**
     * @var \AppBundle\Entity\Productlines
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Productlines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productLine", referencedColumnName="productLine")
     * })
     */
    private $productline;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Orders", mappedBy="productcode")
     */
    private $ordernumber;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ordernumber = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get productcode
     *
     * @return string
     */
    public function getProductcode()
    {
        return $this->productcode;
    }

    /**
     * Set productname
     *
     * @param string $productname
     *
     * @return Products
     */
    public function setProductname($productname)
    {
        $this->productname = $productname;

        return $this;
    }

    /**
     * Get productname
     *
     * @return string
     */
    public function getProductname()
    {
        return $this->productname;
    }

    /**
     * Set productscale
     *
     * @param string $productscale
     *
     * @return Products
     */
    public function setProductscale($productscale)
    {
        $this->productscale = $productscale;

        return $this;
    }

    /**
     * Get productscale
     *
     * @return string
     */
    public function getProductscale()
    {
        return $this->productscale;
    }

    /**
     * Set productvendor
     *
     * @param string $productvendor
     *
     * @return Products
     */
    public function setProductvendor($productvendor)
    {
        $this->productvendor = $productvendor;

        return $this;
    }

    /**
     * Get productvendor
     *
     * @return string
     */
    public function getProductvendor()
    {
        return $this->productvendor;
    }

    /**
     * Set productdescription
     *
     * @param string $productdescription
     *
     * @return Products
     */
    public function setProductdescription($productdescription)
    {
        $this->productdescription = $productdescription;

        return $this;
    }

    /**
     * Get productdescription
     *
     * @return string
     */
    public function getProductdescription()
    {
        return $this->productdescription;
    }

    /**
     * Set quantityinstock
     *
     * @param integer $quantityinstock
     *
     * @return Products
     */
    public function setQuantityinstock($quantityinstock)
    {
        $this->quantityinstock = $quantityinstock;

        return $this;
    }

    /**
     * Get quantityinstock
     *
     * @return integer
     */
    public function getQuantityinstock()
    {
        return $this->quantityinstock;
    }

    /**
     * Set buyprice
     *
     * @param string $buyprice
     *
     * @return Products
     */
    public function setBuyprice($buyprice)
    {
        $this->buyprice = $buyprice;

        return $this;
    }

    /**
     * Get buyprice
     *
     * @return string
     */
    public function getBuyprice()
    {
        return $this->buyprice;
    }

    /**
     * Set msrp
     *
     * @param string $msrp
     *
     * @return Products
     */
    public function setMsrp($msrp)
    {
        $this->msrp = $msrp;

        return $this;
    }

    /**
     * Get msrp
     *
     * @return string
     */
    public function getMsrp()
    {
        return $this->msrp;
    }

    /**
     * Set productline
     *
     * @param \AppBundle\Entity\Productlines $productline
     *
     * @return Products
     */
    public function setProductline(\AppBundle\Entity\Productlines $productline = null)
    {
        $this->productline = $productline;

        return $this;
    }

    /**
     * Get productline
     *
     * @return \AppBundle\Entity\Productlines
     */
    public function getProductline()
    {
        return $this->productline;
    }

    /**
     * Add ordernumber
     *
     * @param \AppBundle\Entity\Orders $ordernumber
     *
     * @return Products
     */
    public function addOrdernumber(\AppBundle\Entity\Orders $ordernumber)
    {
        $this->ordernumber[] = $ordernumber;

        return $this;
    }

    /**
     * Remove ordernumber
     *
     * @param \AppBundle\Entity\Orders $ordernumber
     */
    public function removeOrdernumber(\AppBundle\Entity\Orders $ordernumber)
    {
        $this->ordernumber->removeElement($ordernumber);
    }

    /**
     * Get ordernumber
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrdernumber()
    {
        return $this->ordernumber;
    }
}
