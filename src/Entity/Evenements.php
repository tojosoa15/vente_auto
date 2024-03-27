<?php

namespace App\Entity;

use App\Repository\EvenementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementsRepository::class)]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $businessAccount = null;

    #[ORM\Column(length: 255)]
    private ?string $eventAccount = null;

    #[ORM\Column(length: 255)]
    private ?string $lastEventCount = null;

    #[ORM\Column]
    private ?int $fileNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $civilityWording = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $currentVehicleOwner = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $routeNumberAndName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adressComplement = null;

    #[ORM\Column]
    private ?int $postalCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?string $homePhone = null;

    #[ORM\Column(nullable: true)]
    private ?string $cellPhone = null;

    #[ORM\Column(nullable: true)]
    private ?string $phoneJob = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOfCirculation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $purchaseDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lastEventDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $brandName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modelWording = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $version = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $registration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $leadType = null;

    #[ORM\Column(nullable: true)]
    private ?int $mileage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $energyLabel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sellerVN = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sellerVO = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billingComment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeVoVn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fileNumberVnVo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vnSalesIntermediary = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $eventDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $originOfEvent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getBusinessAccount(): ?string
    {
        return $this->businessAccount;
    }

    public function setBusinessAccount(string $businessAccount): static
    {
        $this->businessAccount = $businessAccount;

        return $this;
    }

    public function getEventAccount(): ?string
    {
        return $this->eventAccount;
    }

    public function setEventAccount(string $eventAccount): static
    {
        $this->eventAccount = $eventAccount;

        return $this;
    }

    public function getLastEventCount(): ?string
    {
        return $this->lastEventCount;
    }

    public function setLastEventCount(string $lastEventCount): static
    {
        $this->lastEventCount = $lastEventCount;

        return $this;
    }

    public function getFileNumber(): ?int
    {
        return $this->fileNumber;
    }

    public function setFileNumber(int $fileNumber): static
    {
        $this->fileNumber = $fileNumber;

        return $this;
    }

    public function getCivilityWording(): ?string
    {
        return $this->civilityWording;
    }

    public function setCivilityWording(?string $civilityWording): static
    {
        $this->civilityWording = $civilityWording;

        return $this;
    }

    public function getCurrentVehicleOwner(): ?string
    {
        return $this->currentVehicleOwner;
    }

    public function setCurrentVehicleOwner(?string $currentVehicleOwner): static
    {
        $this->currentVehicleOwner = $currentVehicleOwner;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getRouteNumberAndName(): ?string
    {
        return $this->routeNumberAndName;
    }

    public function setRouteNumberAndName(?string $routeNumberAndName): static
    {
        $this->routeNumberAndName = $routeNumberAndName;

        return $this;
    }

    public function getAdressComplement(): ?string
    {
        return $this->adressComplement;
    }

    public function setAdressComplement(?string $adressComplement): static
    {
        $this->adressComplement = $adressComplement;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getHomePhone(): ?string
    {
        return $this->homePhone;
    }

    public function setHomePhone(?string $homePhone): static
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    public function getCellPhone(): ?string
    {
        return $this->cellPhone;
    }

    public function setCellPhone(?string $cellPhone): static
    {
        $this->cellPhone = $cellPhone;

        return $this;
    }

    public function getPhoneJob(): ?string
    {
        return $this->phoneJob;
    }

    public function setPhoneJob(?string $phoneJob): static
    {
        $this->phoneJob = $phoneJob;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateOfCirculation(): ?\DateTimeInterface
    {
        return $this->dateOfCirculation;
    }

    public function setDateOfCirculation(?\DateTimeInterface $dateOfCirculation): static
    {
        $this->dateOfCirculation = $dateOfCirculation;

        return $this;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(?\DateTimeInterface $purchaseDate): static
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getLastEventDate(): ?\DateTimeInterface
    {
        return $this->lastEventDate;
    }

    public function setLastEventDate(?\DateTimeInterface $lastEventDate): static
    {
        $this->lastEventDate = $lastEventDate;

        return $this;
    }

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(?string $brandName): static
    {
        $this->brandName = $brandName;

        return $this;
    }

    public function getModelWording(): ?string
    {
        return $this->modelWording;
    }

    public function setModelWording(?string $modelWording): static
    {
        $this->modelWording = $modelWording;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): static
    {
        $this->vin = $vin;

        return $this;
    }

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(?string $registration): static
    {
        $this->registration = $registration;

        return $this;
    }

    public function getLeadType(): ?string
    {
        return $this->leadType;
    }

    public function setLeadType(?string $leadType): static
    {
        $this->leadType = $leadType;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(?int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getEnergyLabel(): ?string
    {
        return $this->energyLabel;
    }

    public function setEnergyLabel(?string $energyLabel): static
    {
        $this->energyLabel = $energyLabel;

        return $this;
    }

    public function getSellerVN(): ?string
    {
        return $this->sellerVN;
    }

    public function setSellerVN(?string $sellerVN): static
    {
        $this->sellerVN = $sellerVN;

        return $this;
    }

    public function getSellerVO(): ?string
    {
        return $this->sellerVO;
    }

    public function setSellerVO(?string $sellerVO): static
    {
        $this->sellerVO = $sellerVO;

        return $this;
    }

    public function getBillingComment(): ?string
    {
        return $this->billingComment;
    }

    public function setBillingComment(?string $billingComment): static
    {
        $this->billingComment = $billingComment;

        return $this;
    }

    public function getTypeVoVn(): ?string
    {
        return $this->typeVoVn;
    }

    public function setTypeVoVn(?string $typeVoVn): static
    {
        $this->typeVoVn = $typeVoVn;

        return $this;
    }

    public function getFileNumberVnVo(): ?string
    {
        return $this->fileNumberVnVo;
    }

    public function setFileNumberVnVo(?string $fileNumberVnVo): static
    {
        $this->fileNumberVnVo = $fileNumberVnVo;

        return $this;
    }

    public function getVnSalesIntermediary(): ?string
    {
        return $this->vnSalesIntermediary;
    }

    public function setVnSalesIntermediary(?string $vnSalesIntermediary): static
    {
        $this->vnSalesIntermediary = $vnSalesIntermediary;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->eventDate;
    }

    public function setEventDate(?\DateTimeInterface $eventDate): static
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    public function getOriginOfEvent(): ?string
    {
        return $this->originOfEvent;
    }

    public function setOriginOfEvent(?string $originOfEvent): static
    {
        $this->originOfEvent = $originOfEvent;

        return $this;
    }
}
