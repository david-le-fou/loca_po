<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ligneBonExpedition
 *
 * @ORM\Table(name="ligne_bon_expedition")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\ligneBonExpeditionRepository")
 */
class ligneBonExpedition
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
     * @var float
     *
     * @ORM\Column(name="quantite", type="float")
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=255, nullable=true)
     */
    private $observation;

//------------\\\\\\\////////////-----------

    /**
     * @ORM\ManyToOne(targetEntity="ProduitBundle\Entity\Produit")
     * @ORM\JoinColumn(nullable=true)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\BonExpedition", inversedBy="ligneBonExpeditions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bonExpedition;

//------------\\\\\\\////////////-----------


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
     * Set quantite
     *
     * @param float $quantite
     *
     * @return ligneBonExpedition
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return float
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return ligneBonExpedition
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }



    /**
     * Set produit
     *
     * @param \ProduitBundle\Entity\Produit $produit
     *
     * @return ligneBonExpedition
     */
    public function setProduit(\ProduitBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \ProduitBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set bonExpedition
     *
     * @param \GestionBundle\Entity\BonExpedition $bonExpedition
     *
     * @return ligneBonExpedition
     */
    public function setBonExpedition(\GestionBundle\Entity\BonExpedition $bonExpedition)
    {
        $this->bonExpedition = $bonExpedition;

        return $this;
    }

    /**
     * Get bonExpedition
     *
     * @return \GestionBundle\Entity\BonExpedition
     */
    public function getBonExpedition()
    {
        return $this->bonExpedition;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return ligneBonExpedition
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }
}
