<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payments
 *
 * @ORM\Table(name="payments", indexes={@ORM\Index(name="IDX_65D29B32D53183C5", columns={"customerNumber"})})
 * @ORM\Entity
 */
class Payments
{
    /**
     * @var string
     *
     * @ORM\Column(name="checkNumber", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $checknumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paymentDate", type="date", nullable=false)
     */
    private $paymentdate;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $amount;

    /**
     * @var \AppBundle\Entity\Customers
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customerNumber", referencedColumnName="customerNumber", unique=true)
     * })
     */
    private $customernumber;



    /**
     * Set checknumber
     *
     * @param string $checknumber
     *
     * @return Payments
     */
    public function setChecknumber($checknumber)
    {
        $this->checknumber = $checknumber;

        return $this;
    }

    /**
     * Get checknumber
     *
     * @return string
     */
    public function getChecknumber()
    {
        return $this->checknumber;
    }

    /**
     * Set paymentdate
     *
     * @param \DateTime $paymentdate
     *
     * @return Payments
     */
    public function setPaymentdate($paymentdate)
    {
        $this->paymentdate = $paymentdate;

        return $this;
    }

    /**
     * Get paymentdate
     *
     * @return \DateTime
     */
    public function getPaymentdate()
    {
        return $this->paymentdate;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Payments
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set customernumber
     *
     * @param \AppBundle\Entity\Customers $customernumber
     *
     * @return Payments
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
}
