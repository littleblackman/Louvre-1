<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Sale
 *
 * @ORM\Table(name="sale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SaleRepository")
 */
class Sale
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
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="sale")
     * @ORM\OrderBy({"id" = "ASC"})
     */     
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereservation", type="date")
     */
    private $datereservation;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="sale")
     * @ORM\OrderBy({"id" = "ASC"})
     */     
    private $tickets;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="visit", type="date")
     */
    private $visit;

    /**
     * @var bool
     *
     * @ORM\Column(name="typeticket", type="boolean")
     */
    private $typeticket;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;
    
   

      public function __construct()
    {
        $tickets = new ArrayCollection();
        $datereservation = new \Datetime('now');
    }

    
      /**
      * add a ticket
     *
     * @param Ticket $ticket
     * @return $this
     */
    public function addTicket(Ticket $ticket)
    {
        $this->tickets[] = $ticket;
        $ticket->setSale($this);
        return $this;
    }

    /**
    * get tickets
    * @return ArrayCollection
    */
    public function getTickets()
    {
        return $this->tickets;
    }
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
     * Set datereservation
     *
     * @param \DateTime $datereservation
     *
     * @return Sale
     */
    public function setDatereservation($datereservation)
    {
        $this->datereservation = $datereservation;

        return $this;
    }

    /**
     * Get datereservation
     *
     * @return \DateTime
     */
    public function getDatereservation()
    {
        return $this->datereservation;
    }
    /**
     * Set visit
     *
     * @param \DateTime $visit
     *
     * @return Sale
     */
    public function setVisit($visit)
    {
        $this->visit = $visit;

        return $this;
    }

    /**
     * Get visit
     *
     * @return \DateTime
     */
    public function getVisit()
    {
        return $this->visit;
    }

    /**
     * Set typeticket
     *
     * @param boolean $typeticket
     *
     * @return Sale
     */
    public function setTypeticket($typeticket)
    {
        $this->typeticket = $typeticket;

        return $this;
    }

    /**
     * Get typeticket
     *
     * @return bool
     */
    public function getTypeticket()
    {
        return $this->typeticket;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Sale
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}

