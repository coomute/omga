<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Meta
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="MetaGenreRelation", mappedBy="meta")
     */
    private $genres;


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
     * @return Meta
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
     * Constructor
     */
    public function __construct()
    {
        $this->genres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add genres
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $genres
     * @return Meta
     */
    public function addGenre(\Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $genres)
    {
        $this->genres[] = $genres;

        return $this;
    }

    /**
     * Remove genres
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $genres
     */
    public function removeGenre(\Coomute\Bundle\OmgaBundle\Entity\MetaGenreRelation $genres)
    {
        $this->genres->removeElement($genres);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGenres()
    {
        return $this->genres;
    }
}
