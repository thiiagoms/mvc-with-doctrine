<?php

namespace App\Entity;

/**
 *  User entity
 * 
 * @Entity
 * @Table(name="user")
 */
class User
{
    /**
     * Primary key and user identifier
     * 
     * @Id
     * @GeneratedValue
     * @Column(type="integer",name="id")
     */
    private $_id;

    /**
     * @Column(type="string",name="email")
     */
    private $_email;

    /**
     * @Column(type="string",name="password")
     */
    private $_password;


    public function getId(): int
    {
        return $this->_id;
    }

    public function getEmail(): string
    {
        return $this->_email;
    }

    public function setEmail(string $email): self
    {
        $this->_email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->_password;
    }

    public function setPassword(string $password): self
    {
        $this->_password = $password;
        return $this;
    }
}
