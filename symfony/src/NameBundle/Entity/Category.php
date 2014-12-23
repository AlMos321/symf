<?php

namespace NameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */

class Category
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="category", cascade={"persist"})
     * @ORM\JoinColumn(name="prdod_cat", referencedColumnName="id")
     */

    private $prod;

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
     * @return Category
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
     * Set prod
     *
     * @param \NameBundle\Entity\Product $prod
     * @return Category
     */
    public function setProd(\NameBundle\Entity\Product $category = null)
    {
        $this->prod = $category;

        return $this;
    }

    /**
     * Get prod
     *
     * @return \NameBundle\Entity\Product 
     */
    public function getProd()
    {
        return $this->prod;
    }
}
