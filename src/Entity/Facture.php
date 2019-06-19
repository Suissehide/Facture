<?php

namespace App\Entity;
// namespace Doctrine\Common\Collections;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $myCompany;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clientCompany;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $VAT;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $invoiceDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dueDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $projectDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paymentMethods;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $invoiceNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $referenceNo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $invoiceTerms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Description", mappedBy="facture")
     */
    private $descriptions;



    public function __construct()
    {
        $this->descriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMyCompany(): ?string
    {
        return $this->myCompany;
    }

    public function setMyCompany(?string $myCompany): self
    {
        $this->myCompany = $myCompany;

        return $this;
    }

    public function getClientCompany(): ?string
    {
        return $this->clientCompany;
    }

    public function setClientCompany(?string $clientCompany): self
    {
        $this->clientCompany = $clientCompany;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getVAT(): ?int
    {
        return $this->VAT;
    }

    public function setVAT(?int $VAT): self
    {
        $this->VAT = $VAT;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?\DateTimeInterface $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getProjectDescription(): ?string
    {
        return $this->projectDescription;
    }

    public function setProjectDescription(?string $projectDescription): self
    {
        $this->projectDescription = $projectDescription;

        return $this;
    }

    public function getPaymentMethods(): ?string
    {
        return $this->paymentMethods;
    }

    public function setPaymentMethods(?string $paymentMethods): self
    {
        $this->paymentMethods = $paymentMethods;

        return $this;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getReferenceNo(): ?string
    {
        return $this->referenceNo;
    }

    public function setReferenceNo(?string $referenceNo): self
    {
        $this->referenceNo = $referenceNo;

        return $this;
    }

    public function getInvoiceTerms(): ?string
    {
        return $this->invoiceTerms;
    }

    public function setInvoiceTerms(?string $invoiceTerms): self
    {
        $this->invoiceTerms = $invoiceTerms;

        return $this;
    }

    /**
     * @return Collection|Description[]
     */
    public function getDescriptions(): Collection
    {
        return $this->descriptions;
    }

    public function addDescription(Description $description): self
    {
        if (!$this->descriptions->contains($description)) {
            $this->descriptions[] = $description;
            $description->setFacture($this);
        }

        return $this;
    }

    public function removeDescription(Description $description): self
    {
        if ($this->descriptions->contains($description)) {
            $this->descriptions->removeElement($description);
            // set the owning side to null (unless already changed)
            if ($description->getFacture() === $this) {
                $description->setFacture(null);
            }
        }

        return $this;
    }
}
