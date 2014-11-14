<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaSyn
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MetaSyn
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
      * @ORM\ManyToOne(targetEntity="Meta", inversedBy="syns")
      * @ORM\JoinColumn(name="meta_id", referencedColumnName="id")
    **/
    private $metaId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set metaId
     *
     * @param integer $metaId
     * @return MetaSyn
     */
    public function setMetaId($metaId)
    {
        $this->metaId = $metaId;

        return $this;
    }

    /**
     * Get metaId
     *
     * @return integer 
     */
    public function getMetaId()
    {
        return $this->metaId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return MetaSyn
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
}
