<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employees
 *
 * @ORM\Table(name="employees", indexes={@ORM\Index(name="reportsTo", columns={"reportsTo"}), @ORM\Index(name="officeCode", columns={"officeCode"})})
 * @ORM\Entity
 */
class Employees
{
    /**
     * @var integer
     *
     * @ORM\Column(name="employeeNumber", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $employeenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=10, nullable=false)
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="jobTitle", type="string", length=50, nullable=false)
     */
    private $jobtitle;

    /**
     * @var \AppBundle\Entity\Employees
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reportsTo", referencedColumnName="employeeNumber")
     * })
     */
    private $reportsto;

    /**
     * @var \AppBundle\Entity\Offices
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Offices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="officeCode", referencedColumnName="officeCode")
     * })
     */
    private $officecode;



    /**
     * Get employeenumber
     *
     * @return integer
     */
    public function getEmployeenumber()
    {
        return $this->employeenumber;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Employees
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Employees
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return Employees
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Employees
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set jobtitle
     *
     * @param string $jobtitle
     *
     * @return Employees
     */
    public function setJobtitle($jobtitle)
    {
        $this->jobtitle = $jobtitle;

        return $this;
    }

    /**
     * Get jobtitle
     *
     * @return string
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }

    /**
     * Set reportsto
     *
     * @param \AppBundle\Entity\Employees $reportsto
     *
     * @return Employees
     */
    public function setReportsto(\AppBundle\Entity\Employees $reportsto = null)
    {
        $this->reportsto = $reportsto;

        return $this;
    }

    /**
     * Get reportsto
     *
     * @return \AppBundle\Entity\Employees
     */
    public function getReportsto()
    {
        return $this->reportsto;
    }

    /**
     * Set officecode
     *
     * @param \AppBundle\Entity\Offices $officecode
     *
     * @return Employees
     */
    public function setOfficecode(\AppBundle\Entity\Offices $officecode = null)
    {
        $this->officecode = $officecode;

        return $this;
    }

    /**
     * Get officecode
     *
     * @return \AppBundle\Entity\Offices
     */
    public function getOfficecode()
    {
        return $this->officecode;
    }
}
