<?php

namespace App\entity;

/**
 * @Entity
 * @Table(name="categories")
 */
class Category 
{
    /**
     * @Id
     * @Column(name="id", type="integer", nullable=false)
     * @GeneratedValue(strategy="AUTO")
    */
    private $id;
    /**
     * @Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;
    
    /**
     * @return mixed
     */
    public function getId() 
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() 
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Category
     */
    public function setName($name) 
    {
        $this->name = $name;
        return $this;
    }
    
}
