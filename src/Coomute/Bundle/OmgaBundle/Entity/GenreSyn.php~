<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GenreSyn
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class GenreSyn
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
      * @ORM\ManyToOne(targetEntity="Genre", inversedBy="syns")
      * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
    **/
    private $genreId;


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
     * @return GenreSyn
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
     * Set genreId
     *
     * @param integer $genreId
     * @return GenreSyn
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;

        return $this;
    }

    /**
     * Get genreId
     *
     * @return integer 
     */
    public function getGenreId()
    {
        return $this->genreId;
    }
}
