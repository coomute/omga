<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Coomute\Bundle\OmgaBundle\Entity\GenreRepository")
 */
class Genre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_meta", type="integer", nullable=true)
     */
    private $idMeta;

    /**
     * @var integer
     *
     * @ORM\Column(name="tempo_min", type="integer")
     */
    private $tempoMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="tempo_max", type="integer", nullable=true)
     */
    private $tempoMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="electronic_ratio", type="integer", nullable=true)
     */
    private $electronicRatio;

    /**
     * @var integer
     *
     * @ORM\Column(name="acoustic_ratio", type="integer", nullable=true)
     */
    private $acousticRatio;

    /**
     * @var integer
     *
     * @ORM\Column(name="electric_ratio", type="integer", nullable=true)
     */
    private $electricRatio;

    /**
     * @var \integer
     *
     * @ORM\Column(name="year_min", type="integer", nullable=true)
     */
    private $yearMin;

    /**
     * @var \integer
     *
     * @ORM\Column(name="year_max", type="integer", nullable=true)
     */
    private $yearMax;
    
    /**
     * @ORM\OneToMany(targetEntity="MetaGenreRelation", mappedBy="genre")
     */
    private $metas;
    /**
     * @ORM\OneToMany(targetEntity="GenreRel", mappedBy="genre1")
     */
    private $relations;
    /**
     * @ORM\OneToMany(targetEntity="GenreSyn", mappedBy="genreId")
     */
    private $syns;


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
     * Set name
     *
     * @param string $name
     * @return Genre
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name 
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idMeta
     *
     * @param integer $idMeta
     * @return Genre
     */
    public function setIdMeta($idMeta)
    {
        $this->idMeta = $idMeta;

        return $this;
    }

    /**
     * Get idMeta
     *
     * @return integer 
     */
    public function getIdMeta()
    {
        return $this->idMeta;
    }

    /**
     * Set tempoMin
     *
     * @param integer $tempoMin
     * @return Genre
     */
    public function setTempoMin($tempoMin)
    {
        $this->tempoMin = $tempoMin;

        return $this;
    }

    /**
     * Get tempoMin
     *
     * @return integer 
     */
    public function getTempoMin()
    {
        return $this->tempoMin;
    }

    /**
     * Set tempoMax
     *
     * @param integer $tempoMax
     * @return Genre
     */
    public function setTempoMax($tempoMax)
    {
        $this->tempoMax = $tempoMax;

        return $this;
    }

    /**
     * Get tempoMax
     *
     * @return integer 
     */
    public function getTempoMax()
    {
        return $this->tempoMax;
    }

    /**
     * Set electronicRatio
     *
     * @param integer $electronicRatio
     * @return Genre
     */
    public function setElectronicRatio($electronicRatio)
    {
        $this->electronicRatio = $electronicRatio;

        return $this;
    }

    /**
     * Get electronicRatio
     *
     * @return integer 
     */
    public function getElectronicRatio()
    {
        return $this->electronicRatio;
    }

    /**
     * Set acousticRatio
     *
     * @param integer $acousticRatio
     * @return Genre
     */
    public function setAcousticRatio($acousticRatio)
    {
        $this->acousticRatio = $acousticRatio;

        return $this;
    }

    /**
     * Get acousticRatio
     *
     * @return integer 
     */
    public function getAcousticRatio()
    {
        return $this->acousticRatio;
    }

    /**
     * Set electricRatio
     *
     * @param integer $electricRatio
     * @return Genre
     */
    public function setElectricRatio($electricRatio)
    {
        $this->electricRatio = $electricRatio;

        return $this;
    }

    /**
     * Get electricRatio
     *
     * @return integer 
     */
    public function getElectricRatio()
    {
        return $this->electricRatio;
    }

    /**
     * Set yearMin
     *
     * @param \integer $yearMin
     * @return Genre
     */
    public function setYearMin($yearMin)
    {
        $this->yearMin = $yearMin;

        return $this;
    }

    /**
     * Get yearMin
     *
     * @return \integer 
     */
    public function getYearMin()
    {
        return $this->yearMin;
    }

    /**
     * Set yearMax
     *
     * @param \integer $yearMax
     * @return Genre
     */
    public function setYearMax($yearMax)
    {
        $this->yearMax = $yearMax;

        return $this;
    }

    /**
     * Get yearMax
     *
     * @return \integer 
     */
    public function getYearMax()
    {
        return $this->yearMax;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->metas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add metas
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $metas
     * @return Genre
     */
    public function addMeta(\Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $metas)
    {
        $this->metas[] = $metas;

        return $this;
    }

    /**
     * Remove metas
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $metas
     */
    public function removeMeta(\Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $metas)
    {
        $this->metas->removeElement($metas);
    }

    /**
     * Get metas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * Add relations
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\GenreRel $relations
     * @return Genre
     */
    public function addRelation(\Coomute\Bundle\OmgaBundle\Entity\GenreRel $relations)
    {
        $this->relations[] = $relations;

        return $this;
    }

    /**
     * Remove relations
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\GenreRel $relations
     */
    public function removeRelation(\Coomute\Bundle\OmgaBundle\Entity\GenreRel $relations)
    {
        $this->relations->removeElement($relations);
    }

    /**
     * Get relations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * Add syns
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\GenreSyn $syns
     * @return Genre
     */
    public function addSyn(\Coomute\Bundle\OmgaBundle\Entity\GenreSyn $syns)
    {
        $this->syns[] = $syns;

        return $this;
    }

    /**
     * Remove syns
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\GenreSyn $syns
     */
    public function removeSyn(\Coomute\Bundle\OmgaBundle\Entity\GenreSyn $syns)
    {
        $this->syns->removeElement($syns);
    }

    /**
     * Get syns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSyns()
    {
        return $this->syns;
    }
}
