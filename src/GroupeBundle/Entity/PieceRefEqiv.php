<?php

namespace GroupeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PieceRefEqiv
 *
 * @ORM\Table(name="piece_ref_eqiv")
 * @ORM\Entity(repositoryClass="GroupeBundle\Repository\PieceRefEqivRepository")
 */
class PieceRefEqiv
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
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;
//------------- Relation ------------------
    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\ListePiece",inversedBy="piecerefequivs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $listepiece;
//-----------------------------------------

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
     * @return PieceRefEqiv
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
     * Set marque
     *
     * @param string $marque
     *
     * @return PieceRefEqiv
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set listepiece
     *
     * @param \GroupeBundle\Entity\ListePiece $listepiece
     *
     * @return PieceRefEqiv
     */
    public function setListepiece(\GroupeBundle\Entity\ListePiece $listepiece = null)
    {
        $this->listepiece = $listepiece;

        return $this;
    }

    /**
     * Get listepiece
     *
     * @return \GroupeBundle\Entity\ListePiece
     */
    public function getListepiece()
    {
        return $this->listepiece;
    }
}
