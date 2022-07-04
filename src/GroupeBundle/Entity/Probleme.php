<?php

namespace GroupeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Probleme
 *
 * @ORM\Table(name="probleme")
 * @ORM\Entity(repositoryClass="GroupeBundle\Repository\ProblemeRepository")
 */
class Probleme
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
     * @ORM\Column(name="numero", type="string", length=50, unique=true)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_signalement", type="datetime")
     */
    private $dateSignalement;

    /**
     * @var string
     *
     * @ORM\Column(name="cause", type="string", length=255)
     */
    private $cause;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="solution", type="text", nullable=true)
     */
    private $solution;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_resolution", type="datetime", nullable=true)
     */
    private $dateResolution;


    //---------------------------------------------------------

    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\Groupe")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $groupe;

    /**
     * @ORM\OneToOne(targetEntity="GroupeBundle\Entity\HistoriqueEtat", inversedBy="problemeArret")
     *
     */
    private $historiqueArret;

    /**
     * @ORM\OneToOne(targetEntity="GroupeBundle\Entity\HistoriqueEtat", inversedBy="problemeDemarrer")
     *
     */
    private $historiqueeDemarrer;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userCreer;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userSolution;

    /**
     * @ORM\OneToMany(targetEntity="GroupeBundle\Entity\Depense", mappedBy="probleme")
     */
    private $depenses; // Notez le « s », un stocks est liée à plusieurs ligne

    /**
     * @ORM\OneToMany(targetEntity="GroupeBundle\Entity\solutionProbleme", mappedBy="probleme")
     */
    private $ligneSolutions; // Notez le « s », un stocks est liée à plusieurs ligne

    /**
     * @ORM\OneToMany(targetEntity="GroupeBundle\Entity\problemePhoto", mappedBy="probleme")
     */
    private $problemePhotos; // Notez le « s », un stocks est liée à plusieurs ligne

    //---------------------------------------------------------

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param string $numero
     *
     * @return Probleme
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set dateSignalement
     *
     * @param \DateTime $dateSignalement
     *
     * @return Probleme
     */
    public function setDateSignalement($dateSignalement)
    {
        $this->dateSignalement = $dateSignalement;

        return $this;
    }

    /**
     * Get dateSignalement
     *
     * @return \DateTime
     */
    public function getDateSignalement()
    {
        return $this->dateSignalement;
    }

    /**
     * Set cause
     *
     * @param string $cause
     *
     * @return Probleme
     */
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Get cause
     *
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Probleme
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Probleme
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set solution
     *
     * @param string $solution
     *
     * @return Probleme
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * Get solution
     *
     * @return string
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * Set dateResolution
     *
     * @param \DateTime $dateResolution
     *
     * @return Probleme
     */
    public function setDateResolution($dateResolution)
    {
        $this->dateResolution = $dateResolution;

        return $this;
    }

    /**
     * Get dateResolution
     *
     * @return \DateTime
     */
    public function getDateResolution()
    {
        return $this->dateResolution;
    }

    /**
     * Set groupe
     *
     * @param \GroupeBundle\Entity\Groupe $groupe
     *
     * @return Probleme
     */
    public function setGroupe(\GroupeBundle\Entity\Groupe $groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return \GroupeBundle\Entity\Groupe
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set historiqueArret
     *
     * @param \GroupeBundle\Entity\HistoriqueEtat $historiqueArret
     *
     * @return Probleme
     */
    public function setHistoriqueArret(\GroupeBundle\Entity\HistoriqueEtat $historiqueArret = null)
    {
        $this->historiqueArret = $historiqueArret;

        return $this;
    }

    /**
     * Get historiqueArret
     *
     * @return \GroupeBundle\Entity\HistoriqueEtat
     */
    public function getHistoriqueArret()
    {
        return $this->historiqueArret;
    }

    /**
     * Set historiqueeDemarrer
     *
     * @param \GroupeBundle\Entity\HistoriqueEtat $historiqueeDemarrer
     *
     * @return Probleme
     */
    public function setHistoriqueeDemarrer(\GroupeBundle\Entity\HistoriqueEtat $historiqueeDemarrer = null)
    {
        $this->historiqueeDemarrer = $historiqueeDemarrer;

        return $this;
    }

    /**
     * Get historiqueeDemarrer
     *
     * @return \GroupeBundle\Entity\HistoriqueEtat
     */
    public function getHistoriqueeDemarrer()
    {
        return $this->historiqueeDemarrer;
    }

    /**
     * Set userCreer
     *
     * @param \UserBundle\Entity\User $userCreer
     *
     * @return Probleme
     */
    public function setUserCreer(\UserBundle\Entity\User $userCreer)
    {
        $this->userCreer = $userCreer;

        return $this;
    }

    /**
     * Get userCreer
     *
     * @return \UserBundle\Entity\User
     */
    public function getUserCreer()
    {
        return $this->userCreer;
    }

    /**
     * Set userSolution
     *
     * @param \UserBundle\Entity\User $userSolution
     *
     * @return Probleme
     */
    public function setUserSolution(\UserBundle\Entity\User $userSolution = null)
    {
        $this->userSolution = $userSolution;

        return $this;
    }

    /**
     * Get userSolution
     *
     * @return \UserBundle\Entity\User
     */
    public function getUserSolution()
    {
        return $this->userSolution;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->depenses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add depense
     *
     * @param \GroupeBundle\Entity\Depense $depense
     *
     * @return Probleme
     */
    public function addDepense(\GroupeBundle\Entity\Depense $depense)
    {
        $this->depenses[] = $depense;

        return $this;
    }

    /**
     * Remove depense
     *
     * @param \GroupeBundle\Entity\Depense $depense
     */
    public function removeDepense(\GroupeBundle\Entity\Depense $depense)
    {
        $this->depenses->removeElement($depense);
    }

    /**
     * Get depenses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepenses()
    {
        return $this->depenses;
    }

    /**
     * Add ligneSolution
     *
     * @param \GroupeBundle\Entity\solutionProbleme $ligneSolution
     *
     * @return Probleme
     */
    public function addLigneSolution(\GroupeBundle\Entity\solutionProbleme $ligneSolution)
    {
        $this->ligneSolutions[] = $ligneSolution;

        return $this;
    }

    /**
     * Remove ligneSolution
     *
     * @param \GroupeBundle\Entity\solutionProbleme $ligneSolution
     */
    public function removeLigneSolution(\GroupeBundle\Entity\solutionProbleme $ligneSolution)
    {
        $this->ligneSolutions->removeElement($ligneSolution);
    }

    /**
     * Get ligneSolutions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLigneSolutions()
    {
        return $this->ligneSolutions;
    }

    /**
     * Add problemePhoto
     *
     * @param \GroupeBundle\Entity\problemePhoto $problemePhoto
     *
     * @return Probleme
     */
    public function addProblemePhoto(\GroupeBundle\Entity\problemePhoto $problemePhoto)
    {
        $this->problemePhotos[] = $problemePhoto;

        return $this;
    }

    /**
     * Remove problemePhoto
     *
     * @param \GroupeBundle\Entity\problemePhoto $problemePhoto
     */
    public function removeProblemePhoto(\GroupeBundle\Entity\problemePhoto $problemePhoto)
    {
        $this->problemePhotos->removeElement($problemePhoto);
    }

    /**
     * Get problemePhotos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProblemePhotos()
    {
        return $this->problemePhotos;
    }
}
