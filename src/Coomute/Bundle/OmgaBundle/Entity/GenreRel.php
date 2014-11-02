<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GenreRel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GenreRel
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
      * @ORM\ManyToOne(targetEntity="Genre", inversedBy="relations")
      * @ORM\JoinColumn(name="genre_1_id", referencedColumnName="id")
    **/
    private $genre1;

    /**
      * @ORM\ManyToOne(targetEntity="Genre", inversedBy="relations")
      * @ORM\JoinColumn(name="genre_2_id", referencedColumnName="id")
    **/
    private $genre2;

    /**
      * @ORM\ManyToOne(targetEntity="GenreRelType", inversedBy="genres")
      * @ORM\JoinColumn(name="rel_type_id", referencedColumnName="id")
    **/
    private $relType;


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
     * Set genre1Id
     *
     * @param integer $genre1Id
     * @return GenreRel
     */
    public function setGenre1Id($genre1Id)
    {
        $this->genre1Id = $genre1Id;

        return $this;
    }

    /**
     * Get genre1Id
     *
     * @return integer 
     */
    public function getGenre1Id()
    {
        return $this->genre1Id;
    }

    /**
     * Set genre2Id
     *
     * @param integer $genre2Id
     * @return GenreRel
     */
    public function setGenre2Id($genre2Id)
    {
        $this->genre2Id = $genre2Id;

        return $this;
    }

    /**
     * Get genre2Id
     *
     * @return integer 
     */
    public function getGenre2Id()
    {
        return $this->genre2Id;
    }

    /**
     * Set relTypeId
     *
     * @param integer $relTypeId
     * @return GenreRel
     */
    public function setRelTypeId($relTypeId)
    {
        $this->relTypeId = $relTypeId;

        return $this;
    }

    /**
     * Get relTypeId
     *
     * @return integer 
     */
    public function getRelTypeId()
    {
        return $this->relTypeId;
    }

    /**
     * Set genre1
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\Genre $genre1
     * @return GenreRel
     */
    public function setGenre1(\Coomute\Bundle\OmgaBundle\Entity\Genre $genre1 = null)
    {
        $this->genre1 = $genre1;

        return $this;
    }

    /**
     * Get genre1
     *
     * @return \Coomute\Bundle\OmgaBundle\Entity\Genre 
     */
    public function getGenre1()
    {
        return $this->genre1;
    }

    /**
     * Set genre2
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\Genre $genre2
     * @return GenreRel
     */
    public function setGenre2(\Coomute\Bundle\OmgaBundle\Entity\Genre $genre2 = null)
    {
        $this->genre2 = $genre2;

        return $this;
    }

    /**
     * Get genre2
     *
     * @return \Coomute\Bundle\OmgaBundle\Entity\Genre 
     */
    public function getGenre2()
    {
        return $this->genre2;
    }

    /**
     * Set relType
     *
     * @param \Coomute\Bundle\OmgaBundle\Entity\GenreRelType $relType
     * @return GenreRel
     */
    public function setRelType(\Coomute\Bundle\OmgaBundle\Entity\GenreRelType $relType = null)
    {
        $this->relType = $relType;

        return $this;
    }

    /**
     * Get relType
     *
     * @return \Coomute\Bundle\OmgaBundle\Entity\GenreRelType 
     */
    public function getRelType()
    {
        return $this->relType;
    }
}
