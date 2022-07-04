<?php

namespace ProduitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Immo
 *
 * @ORM\Table(name="immo")
 * @ORM\Entity(repositoryClass="ProduitBundle\Repository\ImmoRepository")
 */
class Immo
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
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    // ------------------- RELATION ---------------------

    /**
     * @ORM\OneToMany(targetEntity="ProduitBundle\Entity\HistoriqueImmo", mappedBy="immo")
     */
    private $historiqueImmos; // Notez le « s », il y a plusieur historique

    /**
     * @ORM\ManyToOne(targetEntity="ProduitBundle\Entity\Depot", inversedBy="immos")
     * @ORM\JoinColumn(nullable=true)
     */
    private $depot;

    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\Site", inversedBy="immos")
     * @ORM\JoinColumn(nullable=true)
     */
    private $site;



    // ------------------- ////// RELATION ////// ---------------------


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
     * Set designation
     *
     * @param string $designation
     *
     * @return Immo
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
     * Set code
     *
     * @param string $code
     *
     * @return Immo
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Immo
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->historiqueImmos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add historiqueImmo
     *
     * @param \ProduitBundle\Entity\HistoriqueImmo $historiqueImmo
     *
     * @return Immo
     */
    public function addHistoriqueImmo(\ProduitBundle\Entity\HistoriqueImmo $historiqueImmo)
    {
        $this->historiqueImmos[] = $historiqueImmo;

        return $this;
    }

    /**
     * Remove historiqueImmo
     *
     * @param \ProduitBundle\Entity\HistoriqueImmo $historiqueImmo
     */
    public function removeHistoriqueImmo(\ProduitBundle\Entity\HistoriqueImmo $historiqueImmo)
    {
        $this->historiqueImmos->removeElement($historiqueImmo);
    }

    /**
     * Get historiqueImmos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHistoriqueImmos()
    {
        return $this->historiqueImmos;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Immo
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set depot
     *
     * @param \ProduitBundle\Entity\Depot $depot
     *
     * @return Immo
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
     * @return Immo
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
}
