<?php
namespace FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


class Author
{
    /**
     * @Assert\NotBlank()
     */

    /**
     * @ORM\Column(type="text")
     */

    public $name;
}