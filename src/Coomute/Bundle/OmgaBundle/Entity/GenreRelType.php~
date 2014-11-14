<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RelType
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
     * @ORM\Column(name="rel_type", type="string", length=255)
     */
    private $relType;
    /**
     * @ORM\OneToMany(targetEntity="GenreRel", mappedBy="genres")
     */
    private $relations;


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
     * Set relType
     *
     * @param string $relType
     * @return RelType
     */
    public function setRelType($relType)
    {
        $this->relType = $relType;

        return $this;
    }

    /**
     * Get relType
     *
     * @return string 
     */
    public function getRelType()
    {
        return $this->relType;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->relations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add relations
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\GenreRel $relations
     * @return RelType
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
}
