<?php

namespace ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueProduit
 *
 * @ORM\Table(name="historique_produit")
 * @ORM\Entity(repositoryClass="ProduitBundle\Repository\HistoriqueProduitRepository")
 */
class HistoriqueProduit
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="quantite", type="float")
     */
    private $quantite;

//------------\\\\\\\////////////-----------

    /**
     * @ORM\ManyToOne(targetEntity="ProduitBundle\Entity\Produit", inversedBy="historiqueProduits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\Entre")
     * @ORM\JoinColumn(nullable=true)
     */
    private $entre;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\Sortie")
     * @ORM\JoinColumn(nullable=true)
     */
    private $sortie;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\Commande")
     * @ORM\JoinColumn(nullable=true)
     */
    private $commande;
    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\Deplacement")
     * @ORM\JoinColumn(nullable=true)
     */
    private $deplacement;

    /**
     * @ORM\ManyToOne(targetEntity="ProduitBundle\Entity\Depot")
     * @ORM\JoinColumn(nullable=true)
     */
    private $depot;

    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\Site")
     * @ORM\JoinColumn(nullable=true)
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\Vidange")
     * @ORM\JoinColumn(nullable=true)
     */
    private $vidange;

    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\Appoint")
     * @ORM\JoinColumn(nullable=true)
     */
    private $appoint;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\BonExpedition")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bonExpedition;

    /**
     * @ORM\ManyToOne(targetEntity="GestionBundle\Entity\BonLivraison")
     * @ORM\JoinColumn(nullable=true)
     */
    private $bonLivraison;

    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\SuiviPiece")
     * @ORM\JoinColumn(nullable=true)
     */
    private $remplacementPiece;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return HistoriqueProduit
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }


    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return HistoriqueProduit
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set quantite
     *
     * @param float $quantite
     *
     * @return HistoriqueProduit
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
     * Set produit
     *
     * @param \ProduitBundle\Entity\Produit $produit
     *
     * @return HistoriqueProduit
     */
    public function setProduit(\ProduitBundle\Entity\Produit $produit)
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
     * Set entre
     *
     * @param \GestionBundle\Entity\Entre $entre
     *
     * @return HistoriqueProduit
     */
    public function setEntre(\GestionBundle\Entity\Entre $entre = null)
    {
        $this->entre = $entre;

        return $this;
    }

    /**
     * Get entre
     *
     * @return \GestionBundle\Entity\Entre
     */
    public function getEntre()
    {
        return $this->entre;
    }

    /**
     * Set sortie
     *
     * @param \GestionBundle\Entity\Sortie $sortie
     *
     * @return HistoriqueProduit
     */
    public function setSortie(\GestionBundle\Entity\Sortie $sortie = null)
    {
        $this->sortie = $sortie;

        return $this;
    }

    /**
     * Get sortie
     *
     * @return \GestionBundle\Entity\Sortie
     */
    public function getSortie()
    {
        return $this->sortie;
    }

    /**
     * Set deplacement
     *
     * @param \GestionBundle\Entity\Deplacement $deplacement
     *
     * @return HistoriqueProduit
     */
    public function setDeplacement(\GestionBundle\Entity\Deplacement $deplacement = null)
    {
        $this->deplacement = $deplacement;

        return $this;
    }

    /**
     * Get deplacement
     *
     * @return \GestionBundle\Entity\Deplacement
     */
    public function getDeplacement()
    {
        return $this->deplacement;
    }

    /**
     * Set depot
     *
     * @param \ProduitBundle\Entity\Depot $depot
     *
     * @return HistoriqueProduit
     */
    public function setDepot(\ProduitBundle\Entity\Depot $depot = null)
    {
        $this->depot = $depot;

        return $this;
    }

    /**
     * Get depot
     *
     * @return \ProduitBundle\Entity\Depot
     */
    public function getDepot()
    {
        return $this->depot;
    }

    /**
     * Set site
     *
     * @param \GroupeBundle\Entity\Site $site
     *
     * @return HistoriqueProduit
     */
    public function setSite(\GroupeBundle\Entity\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \GroupeBundle\Entity\Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set vidange
     *
     * @param \GroupeBundle\Entity\Vidange $vidange
     *
     * @return HistoriqueProduit
     */
    public function setVidange(\GroupeBundle\Entity\Vidange $vidange = null)
    {
        $this->vidange = $vidange;

        return $this;
    }

    /**
     * Get vidange
     *
     * @return \GroupeBundle\Entity\Vidange
     */
    public function getVidange()
    {
        return $this->vidange;
    }

    /**
     * Set appoint
     *
     * @param \GroupeBundle\Entity\Appoint $appoint
     *
     * @return HistoriqueProduit
     */
    public function setAppoint(\GroupeBundle\Entity\Appoint $appoint = null)
    {
        $this->appoint = $appoint;

        return $this;
    }

    /**
     * Get appoint
     *
     * @return \GroupeBundle\Entity\Appoint
     */
    public function getAppoint()
    {
        return $this->appoint;
    }

    /**
     * Set commande
     *
     * @param \GestionBundle\Entity\Commande $commande
     *
     * @return HistoriqueProduit
     */
    public function setCommande(\GestionBundle\Entity\Commande $commande = null)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \GestionBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Set bonExpedition
     *
     * @param \GestionBundle\Entity\BonExpedition $bonExpedition
     *
     * @return HistoriqueProduit
     */
    public function setBonExpedition(\GestionBundle\Entity\BonExpedition $bonExpedition = null)
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
     * Set remplacementPiece
     *
     * @param \GroupeBundle\Entity\SuiviPiece $remplacementPiece
     *
     * @return HistoriqueProduit
     */
    public function setRemplacementPiece(\GroupeBundle\Entity\SuiviPiece $remplacementPiece = null)
    {
        $this->remplacementPiece = $remplacementPiece;

        return $this;
    }

    /**
     * Get remplacementPiece
     *
     * @return \GroupeBundle\Entity\SuiviPiece
     */
    public function getRemplacementPiece()
    {
        return $this->remplacementPiece;
    }

    /**
     * Set bonLivraison
     *
     * @param \GestionBundle\Entity\BonLivraison $bonLivraison
     *
     * @return HistoriqueProduit
     */
    public function setBonLivraison(\GestionBundle\Entity\BonLivraison $bonLivraison = null)
    {
        $this->bonLivraison = $bonLivraison;

        return $this;
    }

    /**
     * Get bonLivraison
     *
     * @return \GestionBundle\Entity\BonLivraison
     */
    public function getBonLivraison()
    {
        return $this->bonLivraison;
    }
}
