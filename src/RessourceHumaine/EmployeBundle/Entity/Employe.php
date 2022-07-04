<?php

namespace RessourceHumaine\EmployeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe")
 * @ORM\Entity(repositoryClass="RessourceHumaine\EmployeBundle\Repository\EmployeRepository")
 */
class Employe
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="imageUrl", type="string", length=255)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=50)
     */
    private $poste;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=50, nullable=true)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="cnaps", type="string", length=50, nullable=true)
     */
    private $cnaps;

    /**
     * @var string
     *
     * @ORM\Column(name="ostie", type="string", length=50, nullable=true)
     */
    private $ostie;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var float
     *
     * @ORM\Column(name="salaire", type="float")
     */
    private $salaire;

    /**
     * @var float
     *
     * @ORM\Column(name="salaire_min", type="float", nullable=true)
     */
    private $salaireMin;

    /**
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="string", length=255, unique=true)
     */
    private $nomComplet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetimetz")
     */
    private $dateDebut;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebauche", type="datetimetz" ,nullable=true)
     */
    private $dateDebauche;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=50)
     */
    private $slug;
    /**
     * @var string
     *
     * @ORM\Column(name="matricul", type="string", length=50, nullable=true)
     */
    private $matricul;
    /**
     * @var array
     *
     * @ORM\Column(name="modification", type="array", nullable=true)
     */
    private $test_modification;

    /**
     * @var float
     *
     * @ORM\Column(name="nb_enfant", type="integer", nullable=true)
     */
    private $nbEnfant;

    /**
     * @var string
     *
     * @ORM\Column(name="methode_paiement", type="string", length=50, nullable=true)
     */
    private $methodePaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="rib", type="string", length=50, nullable=true)
     */
    private $rib;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=50, nullable=true)
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="numCin", type="string", length=50, nullable=true)
     */
    private $numCin;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=50, nullable=true)
     */
    private $categorie;

    /**
     * @var float
     *
     * @ORM\Column(name="allocation_conge", type="float", nullable=true)
     */
    private $allocationConge;
    /**
     * @var string
     *
     * @ORM\Column(name="beneficiaire", type="string", length=50, nullable=true)
     */
    private $beneficiaire;
    /**
     * @var string
     *
     * @ORM\Column(name="numero_compte", type="string", length=50, nullable=true)
     */
    private $numeroCompte;
    /**
     * @var string
     *
     * @ORM\Column(name="nom_banque", type="string", length=50, nullable=true)
     */
    private $nomBanque;

    /**
     * @var bool
     *
     * @ORM\Column(name="innactif_ostie", type="boolean", nullable=true)
     */
    private $innactifOstie;

    /**
     * @var bool
     *
     * @ORM\Column(name="innactif_cnaps", type="boolean", nullable=true)
     */
    private $innactifCnaps;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Employe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Employe
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Employe
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Employe
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return Employe
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Employe
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Employe
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
     * Set cnaps
     *
     * @param string $cnaps
     *
     * @return Employe
     */
    public function setCnaps($cnaps)
    {
        $this->cnaps = $cnaps;

        return $this;
    }

    /**
     * Get cnaps
     *
     * @return string
     */
    public function getCnaps()
    {
        return $this->cnaps;
    }

    /**
     * Set ostie
     *
     * @param string $ostie
     *
     * @return Employe
     */
    public function setOstie($ostie)
    {
        $this->ostie = $ostie;

        return $this;
    }

    /**
     * Get ostie
     *
     * @return string
     */
    public function getOstie()
    {
        return $this->ostie;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Employe
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set salaire
     *
     * @param float $salaire
     *
     * @return Employe
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return float
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set salaireMin
     *
     * @param float $salaireMin
     *
     * @return Employe
     */
    public function setSalaireMin($salaireMin)
    {
        $this->salaireMin = $salaireMin;

        return $this;
    }

    /**
     * Get salaireMin
     *
     * @return float
     */
    public function getSalaireMin()
    {
        return $this->salaireMin;
    }

    /**
     * Set nomComplet
     *
     * @param string $nomComplet
     *
     * @return Employe
     */
    public function setNomComplet($nomComplet)
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    /**
     * Get nomComplet
     *
     * @return string
     */
    public function getNomComplet()
    {
        return $this->nomComplet;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Employe
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateDebauche
     *
     * @param \DateTime $dateDebauche
     *
     * @return Employe
     */
    public function setDateDebauche($dateDebauche)
    {
        $this->dateDebauche = $dateDebauche;

        return $this;
    }

    /**
     * Get dateDebauche
     *
     * @return \DateTime
     */
    public function getDateDebauche()
    {
        return $this->dateDebauche;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Employe
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set matricul
     *
     * @param string $matricul
     *
     * @return Employe
     */
    public function setMatricul($matricul)
    {
        $this->matricul = $matricul;

        return $this;
    }

    /**
     * Get matricul
     *
     * @return string
     */
    public function getMatricul()
    {
        return $this->matricul;
    }

    /**
     * Set testModification
     *
     * @param array $testModification
     *
     * @return Employe
     */
    public function setTestModification($testModification)
    {
        $this->test_modification = $testModification;

        return $this;
    }

    /**
     * Get testModification
     *
     * @return array
     */
    public function getTestModification()
    {
        return $this->test_modification;
    }

    /**
     * Set nbEnfant
     *
     * @param integer $nbEnfant
     *
     * @return Employe
     */
    public function setNbEnfant($nbEnfant)
    {
        $this->nbEnfant = $nbEnfant;

        return $this;
    }

    /**
     * Get nbEnfant
     *
     * @return integer
     */
    public function getNbEnfant()
    {
        return $this->nbEnfant;
    }

    /**
     * Set methodePaiement
     *
     * @param string $methodePaiement
     *
     * @return Employe
     */
    public function setMethodePaiement($methodePaiement)
    {
        $this->methodePaiement = $methodePaiement;

        return $this;
    }

    /**
     * Get methodePaiement
     *
     * @return string
     */
    public function getMethodePaiement()
    {
        return $this->methodePaiement;
    }

    /**
     * Set rib
     *
     * @param string $rib
     *
     * @return Employe
     */
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return string
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set departement
     *
     * @param string $departement
     *
     * @return Employe
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set numCin
     *
     * @param string $numCin
     *
     * @return Employe
     */
    public function setNumCin($numCin)
    {
        $this->numCin = $numCin;

        return $this;
    }

    /**
     * Get numCin
     *
     * @return string
     */
    public function getNumCin()
    {
        return $this->numCin;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Employe
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set allocationConge
     *
     * @param float $allocationConge
     *
     * @return Employe
     */
    public function setAllocationConge($allocationConge)
    {
        $this->allocationConge = $allocationConge;

        return $this;
    }

    /**
     * Get allocationConge
     *
     * @return float
     */
    public function getAllocationConge()
    {
        return $this->allocationConge;
    }

    /**
     * Set beneficiaire
     *
     * @param string $beneficiaire
     *
     * @return Employe
     */
    public function setBeneficiaire($beneficiaire)
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    /**
     * Get beneficiaire
     *
     * @return string
     */
    public function getBeneficiaire()
    {
        return $this->beneficiaire;
    }

    /**
     * Set numeroCompte
     *
     * @param string $numeroCompte
     *
     * @return Employe
     */
    public function setNumeroCompte($numeroCompte)
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    /**
     * Get numeroCompte
     *
     * @return string
     */
    public function getNumeroCompte()
    {
        return $this->numeroCompte;
    }

    /**
     * Set nomBanque
     *
     * @param string $nomBanque
     *
     * @return Employe
     */
    public function setNomBanque($nomBanque)
    {
        $this->nomBanque = $nomBanque;

        return $this;
    }

    /**
     * Get nomBanque
     *
     * @return string
     */
    public function getNomBanque()
    {
        return $this->nomBanque;
    }

    /**
     * Set innactifOstie
     *
     * @param boolean $innactifOstie
     *
     * @return Employe
     */
    public function setInnactifOstie($innactifOstie)
    {
        $this->innactifOstie = $innactifOstie;

        return $this;
    }

    /**
     * Get innactifOstie
     *
     * @return boolean
     */
    public function getInnactifOstie()
    {
        return $this->innactifOstie;
    }

    /**
     * Set innactifCnaps
     *
     * @param boolean $innactifCnaps
     *
     * @return Employe
     */
    public function setInnactifCnaps($innactifCnaps)
    {
        $this->innactifCnaps = $innactifCnaps;

        return $this;
    }

    /**
     * Get innactifCnaps
     *
     * @return boolean
     */
    public function getInnactifCnaps()
    {
        return $this->innactifCnaps;
    }
}
