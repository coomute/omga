<?php

namespace Coomute\Bundle\OmgaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaRel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MetaRel
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
      * @ORM\ManyToOne(targetEntity="Meta", inversedBy="relations")
      * @ORM\JoinColumn(name="meta_1_id", referencedColumnName="id")
    **/
    private $meta1Id;

    /**
      * @ORM\ManyToOne(targetEntity="Meta", inversedBy="relations")
      * @ORM\JoinColumn(name="meta_2_id", referencedColumnName="id")
    **/
    private $meta2Id;

    /**
     * @var integer
     *
     * @ORM\Column(name="rel_type_id", type="integer")
     */
    private $relTypeId;


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
     * Set meta1Id
     *
     * @param integer $meta1Id
     * @return MetaRel
     */
    public function setMeta1Id($meta1Id)
    {
        $this->meta1Id = $meta1Id;

        return $this;
    }

    /**
     * Get meta1Id
     *
     * @return integer 
     */
    public function getMeta1Id()
    {
        return $this->meta1Id;
    }

    /**
     * Set meta2Id
     *
     * @param integer $meta2Id
     * @return MetaRel
     */
    public function setMeta2Id($meta2Id)
    {
        $this->meta2Id = $meta2Id;

        return $this;
    }

    /**
     * Get meta2Id
     *
     * @return integer 
     */
    public function getMeta2Id()
    {
        return $this->meta2Id;
    }

    /**
     * Set relTypeId
     *
     * @param integer $relTypeId
     * @return MetaRel
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
}
