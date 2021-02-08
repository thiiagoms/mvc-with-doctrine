<?php

namespace App\Entity;

/**
 * Anime entity
 * 
 * @Entity
 * @Table(name="anime")
 */
class Anime
{
    /**
     * Primary key and anime identifier
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer",name="id")
     */
    private $_id;

    /**
     * Anime name
     * 
     * @Column(type="string",name="name")
     */
    private $_name;

    public function getId(): int
    {
        return $this->_id;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName(string $name): self
    {
        $this->_name = $name;
        return $this;
    }

}
