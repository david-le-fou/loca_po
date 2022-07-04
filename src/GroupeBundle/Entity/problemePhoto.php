<?php

namespace GroupeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * problemePhoto
 *
 * @ORM\Table(name="probleme_photo")
 * @ORM\Entity(repositoryClass="GroupeBundle\Repository\problemePhotoRepository")
 */
class problemePhoto
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    // ------------------- RELATION ---------------------

    /**
     * @ORM\ManyToOne(targetEntity="GroupeBundle\Entity\Probleme", inversedBy="problemePhotos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $probleme;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return problemePhoto
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
     * Set url
     *
     * @param string $url
     *
     * @return problemePhoto
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set probleme
     *
     * @param \GroupeBundle\Entity\Probleme $probleme
     *
     * @return problemePhoto
     */
    public function setProbleme(\GroupeBundle\Entity\Probleme $probleme)
    {
        $this->probleme = $probleme;

        return $this;
    }

    /**
     * Get probleme
     *
     * @return \GroupeBundle\Entity\Probleme
     */
    public function getProbleme()
    {
        return $this->probleme;
    }
}
