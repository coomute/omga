<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaGenreRelation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MetaGenreRelation
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
      * @ORM\ManyToOne(targetEntity="Meta", inversedBy="genres")
      * @ORM\JoinColumn(name="meta_id", referencedColumnName="id")
    **/
    private $meta;
    /**
      * @ORM\ManyToOne(targetEntity="Genre", inversedBy="metas")
      * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
    **/
    private $genre;


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
     * Set meta
     *
     * @param integer $meta
     * @return MetaGenreRelation
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Get meta
     *
     * @return integer 
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Set genre
     *
     * @param integer $genre
     * @return MetaGenreRelation
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return integer 
     */
    public function getGenre()
    {
        return $this->genre;
    }
}
